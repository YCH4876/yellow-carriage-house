# Hosting and recovery runbook

How this site is actually served on SiteGround shared hosting, and what to do
when it breaks. Written from a live audit of the server, not from assumptions.

No secrets here — credentials live only in `.env` on the server, which is
outside the document root and is not in this repository.

---

## The serving chain

A request travels through five stages. Knowing which stage failed is most of
the diagnosis.

```
1. DNS          yellowcarriagehouse.com -> 35.209.50.226
2. Apache       document root: ~/www/yellowcarriagehouse.com/public_html
3. .htaccess    picks the PHP version, then rewrites to index.php
4. index.php    loads vendor/autoload.php and bootstrap/app.php
5. Laravel      routes/web.php -> controller or closure -> Blade view
```

### Layout

The application root is the **parent** of the document root:

```
~/www/yellowcarriagehouse.com/     <- app root, NOT web-accessible
├── .env                           <- credentials, APP_KEY. Never in git.
├── app/  bootstrap/  config/  resources/  routes/  storage/  vendor/
├── logs/       <- SiteGround's, not Laravel's. Gitignored.
├── webstats/   <- SiteGround's. Gitignored.
└── public_html/                   <- the document root, web-accessible
    ├── .htaccess
    ├── index.php
    ├── build/          <- compiled Vite assets, committed
    ├── css/main.css    <- hand-written site styles
    ├── img/            <- room photos
    └── .well-known/    <- Let's Encrypt SSL validation. NOT in git.
```

This is the secure arrangement: `.env`, `vendor/` and `storage/` sit above the
web root, so they cannot be fetched over HTTP.

### The two things that make it work

**1. The PHP version is chosen in `.htaccess`, not just the control panel.**

```apache
AddHandler application/x-httpd-php85 .php .php5 .php4 .php3
```

This is a per-directory `mod_php` handler and it **overrides Site Tools**.
Changing the PHP version in the control panel alone will not take effect while
this line disagrees with it. Every installed version is registered as
`mod_php`, so `php83`, `php84` and `php85` are all valid here.

**2. Laravel is told its public directory is `public_html`.**

Laravel's `public_path()` defaults to `base_path().'/public'`, which does not
exist on this server. Anything resolving a path through it — most importantly
the Vite manifest — fails without an override.

Since the Laravel 13 upgrade this lives in `bootstrap/app.php`:

```php
->usePublicPath(dirname(__DIR__).'/public_html');
```

Under Laravel 8 the same job was done by a hand-edit in `public_html/index.php`
(`$app->bind('path.public', ...)`) that was never committed to the repo. If you
ever restore that old install from `old/`, that bind is what it relies on.

---

## Environment facts

| | |
|---|---|
| SSH | `ssh ych` (alias in `~/.ssh/config`), key `~/.ssh/id_ed25519` |
| Host / port | `ssh.yellowcarriagehouse.com`, port `18765` |
| App root | `~/www/yellowcarriagehouse.com` |
| Default CLI `php` | Follows the Site Tools PHP version — currently **8.5.10**. It was 8.2 while the site ran Laravel 8, which is too old for Laravel 13, so never assume it is current. |
| Usable CLI PHP | `/usr/local/bin/php83`, `php84`, `php85` |
| PHP 8.6 | Installed, but **do not use** — `nette/*` caps at 8.5 |
| Composer | 2.4.3, a shell wrapper honouring `PHP_BIN` (bare name, e.g. `php85`) |
| Database | MySQL 8.4 |
| Git | 2.55.0 |

### Two traps specific to this host

**`/usr/local/php85/bin/php` is the CGI build** and rejects `-r`. The CLI build
is `/usr/local/bin/php85`. Scripts that scan for PHP binaries must check the
right path.

**Composer runs under the account default PHP** unless told otherwise. That
tracks the Site Tools setting, so it is only safe by coincidence — when the
account ran 8.2 it refused to install anything at all, because `composer.json`
requires `^8.3`. Always pin it rather than relying on the default:

```bash
PHP_BIN=php85 composer install --no-dev --optimize-autoloader
```

A full path does not work — the wrapper resolves `PHP_BIN` against
`/usr/local/bin`, so it wants the bare name. `deploy.sh` handles this.

---

## When it breaks

Always start here:

```bash
ssh ych
tail -50 ~/www/yellowcarriagehouse.com/storage/logs/laravel.log
```

Do **not** set `APP_DEBUG=true` on the live site to see an error — that exposes
database credentials to anyone who triggers it. The stack trace is in the log.

### Symptom → cause

| Symptom | Likely cause | Fix |
|---|---|---|
| Every page 500s | PHP version mismatch | Check the `AddHandler` line matches an installed version |
| Blank white page | Fatal before Laravel boots | Check `public_html/php_errorlog` |
| Every page 404s except `/` | mod_rewrite not applying | Confirm `.htaccess` exists and is intact |
| "Vite manifest not found" | Public path override lost | Confirm `usePublicPath` in `bootstrap/app.php` |
| Changes deployed but not visible | Stale config/route cache | `php artisan optimize:clear` |
| "Please provide a valid cache path" | `storage/` missing or unwritable | Recreate `storage/framework/{cache,sessions,views}` |
| "table users already exists" | Migration state not reconciled | Guarded migrations should prevent this; check `migrate:status` |
| `Access denied for user 'root'@'localhost'` | Bad DB credentials, or config cached before they were fixed | `php artisan config:clear`, then check `.env`. Deploys continue past it — see below |
| SSL renewal failing | `.well-known` lost in a deploy | Restore from `old/public_html/.well-known` |

### The database

A MySQL database is connected and migrated. It holds the nine tables Laravel's
own migrations create, all empty — **the site issues no database queries at
all.** Every route returns a view, so nothing reads or writes a model.

For a long period the credentials in `.env` did not work at all (an empty
`DB_PASSWORD` and a `DB_USERNAME` MySQL read as `root`), and nobody noticed,
precisely because nothing queries it. If you see this, that is the cause:

```
SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: NO)
```

`deploy.sh` attempts migrations but **does not abort on a connection failure**.
Aborting would skip the cache rebuild and leave the site serving the previous
config and routes while appearing to have deployed cleanly — a far worse failure
than a skipped migration. So a deploy will still succeed if the credentials
break again; watch for the warning rather than assuming a green deploy means the
database is healthy.

**After editing `.env`, run `php artisan config:clear`.** Config is cached, so
credential changes have no effect until it is, and the failure looks identical
to a wrong password.

### Full rollback

The previous install is preserved in `old/` after a deploy. Restoring it is two
moves and takes under a minute:

```bash
cd ~/www/yellowcarriagehouse.com
mkdir -p new
for f in * .[!.]*; do case "$f" in .env|logs|webstats|old|new) continue;; esac; mv "$f" new/; done
mv old/* old/.[!.]* . && rmdir old
```

Then set the PHP version back — under Laravel 8 that means `php82` in the
`.htaccess`.

**If you roll back to Laravel 8, also undo the table rename**, or password reset
will silently break:

```sql
RENAME TABLE password_reset_tokens TO password_resets;
```

Everything else the migration does is additive and Laravel 8 ignores it.

---

## Routine deploys

```bash
ssh ych
cd ~/www/yellowcarriagehouse.com
./deploy.sh
```

That pulls, installs dependencies under the correct PHP, migrates, and rebuilds
caches. It refuses to run on PHP below 8.3, without a `.env`, or with a dirty
working tree.

**Never** run `migrate:rollback`, `migrate:fresh` or `migrate:refresh` against
production. The consolidated migration's `down()` drops the `users` table.

### Backing up the database

Not on the paid backup plan, but this costs nothing:

```bash
cd ~/www/yellowcarriagehouse.com
export $(grep -E '^DB_(HOST|DATABASE|USERNAME|PASSWORD)=' .env | xargs)
mysqldump -h "$DB_HOST" -u "$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" \
  > ~/db-backup-$(date +%Y%m%d).sql
```

Credentials are read from `.env`, so nothing is typed or displayed.

---

## Housekeeping

**Don't edit files directly on the server.** Doing so is how the repository fell
months behind what was actually running — a wrong phone number, a room that had
been withdrawn, and the `.htaccess` PHP pin all lived only on the server. Now
that the site is deployed as a git checkout, `git status` there reports drift
honestly. Changes go through the repo and reach the server via `deploy.sh`.

**Watch the log size.** `storage/logs/laravel.log` reached 176 MB. Truncate with
`truncate -s 0 storage/logs/laravel.log`, and look at what is filling it.

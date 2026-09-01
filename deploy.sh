#!/usr/bin/env bash
#
# Deploy the currently checked-out branch on the server.
#
#   ./deploy.sh
#
# SiteGround's default CLI php is often older than the web php. If `php -v`
# reports anything below 8.3, point this at the right binary instead:
#
#   PHP_BIN=/usr/local/php83/bin/php ./deploy.sh
#
set -euo pipefail

cd "$(dirname "$0")"

COMPOSER="${COMPOSER_BIN:-composer}"

# Pick a usable PHP. SiteGround's default `php` on PATH is frequently older
# than the site's own version, so fall back to scanning the versioned binaries.
# Laravel 13 needs >= 8.3. The upper bound exists because nette/schema and
# nette/utils (via league/commonmark) currently cap at 8.5 - without it, an
# installed 8.6 would be picked and composer would fail partway through.
detect_php() {
    local candidate best="" best_id=0 id
    if [ -n "${PHP_BIN:-}" ]; then printf '%s' "$PHP_BIN"; return; fi
    if command -v php >/dev/null 2>&1 \
       && php -r 'exit(PHP_VERSION_ID >= 80300 && PHP_VERSION_ID < 80600 ? 0 : 1);' 2>/dev/null; then
        printf 'php'; return
    fi
    # SiteGround exposes CLI builds as /usr/local/bin/php84 -> php84/bin/php-cli.
    # The bare /usr/local/php84/bin/php is the CGI build, which has no -r flag;
    # the numeric check below discards it (and anything else non-CLI).
    for candidate in /usr/local/bin/php8* /usr/local/php8*/bin/php-cli \
                     /usr/local/php8*/bin/php /opt/php8*/bin/php /usr/bin/php8.*; do
        [ -x "$candidate" ] || continue
        id="$("$candidate" -r 'echo PHP_VERSION_ID;' 2>/dev/null)" || continue
        case "$id" in ''|*[!0-9]*) continue ;; esac
        if [ "$id" -ge 80300 ] && [ "$id" -lt 80600 ] && [ "$id" -gt "$best_id" ]; then
            best="$candidate"; best_id="$id"
        fi
    done
    printf '%s' "$best"
}

# --- Preflight -------------------------------------------------------------

PHP="$(detect_php)"

if [ -z "$PHP" ] || ! command -v "$PHP" >/dev/null 2>&1; then
    echo "ERROR: no PHP between 8.3 and 8.5 found." >&2
    echo "       Set PHP_BIN explicitly, e.g. PHP_BIN=/usr/local/php84/bin/php" >&2
    exit 1
fi

if ! "$PHP" -r 'exit(PHP_VERSION_ID >= 80300 ? 0 : 1);' 2>/dev/null; then
    echo "ERROR: $PHP is $("$PHP" -r 'echo PHP_VERSION;' 2>/dev/null), but Laravel 13 needs 8.3+." >&2
    echo "       Set PHP_BIN to a newer binary, e.g. PHP_BIN=/usr/local/php84/bin/php" >&2
    exit 1
fi

echo "Using PHP $("$PHP" -r 'echo PHP_VERSION;') at $(command -v "$PHP")"

if ! command -v "$COMPOSER" >/dev/null 2>&1; then
    echo "ERROR: composer binary '$COMPOSER' not found." >&2
    echo "       Install it, or set COMPOSER_BIN, e.g. COMPOSER_BIN='$PHP composer.phar'" >&2
    exit 1
fi

if [ ! -f .env ]; then
    echo "ERROR: no .env in $(pwd). Refusing to deploy." >&2
    exit 1
fi

if ! git diff --quiet || ! git diff --cached --quiet; then
    echo "ERROR: the working tree has local modifications." >&2
    echo "       Deploys must be a clean fast-forward. Inspect with: git status" >&2
    exit 1
fi

# --- Deploy ----------------------------------------------------------------

echo "==> Pulling $(git rev-parse --abbrev-ref HEAD)"
git pull --ff-only

echo "==> Installing PHP dependencies"
"$COMPOSER" install --no-dev --optimize-autoloader

echo "==> Running migrations"
# Guarded migrations; safe to run when there is nothing pending.
# NEVER add rollback/fresh/refresh here - down() drops the users table.
"$PHP" artisan migrate --force

echo "==> Rebuilding caches"
# Must run after every pull: a stale config/route cache silently keeps serving
# the old values, making a successful deploy look like it did nothing.
"$PHP" artisan optimize:clear
"$PHP" artisan optimize

echo
echo "Deployed $(git rev-parse --short HEAD) on $(git rev-parse --abbrev-ref HEAD)."

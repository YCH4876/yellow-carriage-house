#!/usr/bin/env bash
#
# One-time upgrade of the live Laravel 8 site to this Laravel 13 release.
#
# Run it from the freshly cloned directory, inside the domain root:
#
#   cd ~/www/yellowcarriagehouse.com
#   git clone https://github.com/YCH4876/yellow-carriage-house.git new
#   ./new/first-deploy.sh
#
# It backs up .env, adds the environment keys Laravel 11 renamed, installs
# production dependencies, swaps the old app into old/, migrates, and caches.
#
# It does NOT switch the *web* PHP version - that is a Site Tools setting and
# must be done first. The script asks before making any change.
#
# Roll back at any point after the swap with:
#   cd ~/www/yellowcarriagehouse.com
#   mkdir -p new && for f in * .[!.]*; do case "$f" in .env|logs|webstats|old|new) continue;; esac; mv "$f" new/; done
#   mv old/* old/.[!.]* . && rmdir old
#
set -euo pipefail

NEW_DIR="$(cd "$(dirname "$0")" && pwd)"
ROOT="$(dirname "$NEW_DIR")"
PHP="${PHP_BIN:-php}"
COMPOSER="${COMPOSER_BIN:-composer}"
STAMP="$(date +%Y%m%d-%H%M%S)"

say()  { printf '\n\033[1m==> %s\033[0m\n' "$1"; }
warn() { printf '\033[33m    %s\033[0m\n' "$1"; }
die()  { printf '\n\033[31mERROR: %s\033[0m\n' "$1" >&2; exit 1; }

# --- Preflight -------------------------------------------------------------

say "Checking the environment"

[ -f "$NEW_DIR/artisan" ] || die "$NEW_DIR does not look like the cloned app (no artisan)."
[ -f "$ROOT/.env" ]       || die "No .env in $ROOT. Expected to run inside the live domain root."
[ -d "$ROOT/.git" ]       && die "$ROOT is already a git repository. This script is for the first deploy only; use ./deploy.sh instead."
[ -e "$ROOT/old" ]        && die "$ROOT/old already exists. Remove or rename it before running this."

command -v "$PHP" >/dev/null 2>&1 || die "php binary '$PHP' not found. Set PHP_BIN to its full path."
"$PHP" -r 'exit(PHP_VERSION_ID >= 80300 ? 0 : 1);' 2>/dev/null \
  || die "$PHP is $("$PHP" -r 'echo PHP_VERSION;' 2>/dev/null); Laravel 13 needs 8.3+. Set PHP_BIN to a newer binary."
command -v "$COMPOSER" >/dev/null 2>&1 || die "composer binary '$COMPOSER' not found. Set COMPOSER_BIN."

echo "    app root      : $ROOT"
echo "    new release   : $NEW_DIR"
echo "    php           : $PHP ($("$PHP" -r 'echo PHP_VERSION;'))"

# Show exactly what the swap will touch. Anything in the domain root that is
# not on the keep-list gets moved - including files that are not part of the
# Laravel app. Nothing is deleted, but surfacing it here beats discovering it
# after the site is down.

say "Reviewing what the swap will move"

echo "    KEEP in place:"
printf '      %s\n' .env logs webstats

echo "    MOVE into old/:"
( cd "$ROOT" && for f in * .[!.]*; do
    case "$f" in .env|logs|webstats|old|new) continue ;; esac
    [ -e "$f" ] || continue
    printf '      %s\n' "$f"
  done )

cat <<'NOTE'

    Anything listed above that is NOT part of the Laravel app - a database
    file, uploaded media, a custom script - will be moved too. Nothing is
    deleted; it all remains in old/. If you see something there that the site
    needs at runtime, stop and say so.

    Also confirm BOTH of these are done:
      1. A SiteGround backup has been taken (Site Tools > Security > Backups)
      2. The site's *web* PHP version is set to 8.3 or newer
         (Site Tools > Devs > PHP Manager). This script cannot change it,
         and the site will 500 after the swap if it is older.

NOTE
printf "    Type 'yes' to continue: "
read -r reply
[ "$reply" = "yes" ] || die "Aborted, nothing was changed."

# --- Back up ---------------------------------------------------------------

say "Backing up .env"
cp "$ROOT/.env" "$HOME/env-backup-$STAMP.txt"
echo "    saved to $HOME/env-backup-$STAMP.txt"

# --- Environment keys ------------------------------------------------------
#
# Laravel 11 renamed these. The new keys are ADDED rather than replacing the
# old ones, so the .env still works if you roll back to Laravel 8.

say "Adding renamed environment keys"

env_get() { grep -E "^$1=" "$ROOT/.env" | head -1 | cut -d= -f2- || true; }
env_has() { grep -qE "^$1=" "$ROOT/.env"; }

add_key() {
    local new="$1" old="$2" default="$3" value
    if env_has "$new"; then
        echo "    $new already set, leaving alone"
        return
    fi
    value="$(env_get "$old")"
    [ -n "$value" ] || value="$default"
    printf '%s=%s\n' "$new" "$value" >> "$ROOT/.env"
    echo "    added $new=$value"
}

# Ensure the file ends with a newline before appending.
[ -n "$(tail -c1 "$ROOT/.env")" ] && printf '\n' >> "$ROOT/.env"
printf '\n# Added by first-deploy.sh (%s) - Laravel 11 renamed these keys.\n' "$STAMP" >> "$ROOT/.env"

add_key CACHE_STORE          CACHE_DRIVER      file
add_key FILESYSTEM_DISK      FILESYSTEM_DRIVER local
add_key BROADCAST_CONNECTION BROADCAST_DRIVER  log
add_key SESSION_DRIVER       SESSION_DRIVER    file
add_key QUEUE_CONNECTION     QUEUE_CONNECTION  sync

# --- Dependencies ----------------------------------------------------------

say "Installing production dependencies"
( cd "$NEW_DIR" && "$COMPOSER" install --no-dev --optimize-autoloader )

# --- Swap ------------------------------------------------------------------
#
# From here the site is briefly down. Everything moves rather than deletes, so
# the previous install stays intact in old/ for rollback.

say "Swapping in the new release"
mkdir "$ROOT/old"
( cd "$ROOT" && for f in * .[!.]*; do
    case "$f" in .env|logs|webstats|old|new) continue ;; esac
    [ -e "$f" ] || continue
    mv "$f" old/
  done )
( cd "$NEW_DIR" && mv ./* ./.[!.]* "$ROOT/" )
rmdir "$NEW_DIR"
echo "    previous install preserved in $ROOT/old"

# --- Migrate and cache -----------------------------------------------------

say "Running migrations"
( cd "$ROOT" && "$PHP" artisan migrate --force )

say "Building caches"
( cd "$ROOT" && "$PHP" artisan optimize )

# --- Done ------------------------------------------------------------------

say "Deployed $(cd "$ROOT" && git rev-parse --short HEAD) on $(cd "$ROOT" && git rev-parse --abbrev-ref HEAD)"
cat <<EOF

    Check the site now, and /login in particular.

    If something is wrong, roll back:
      cd $ROOT
      mkdir -p new && for f in * .[!.]*; do case "\$f" in .env|logs|webstats|old|new) continue;; esac; mv "\$f" new/; done
      mv old/* old/.[!.]* . && rmdir old
      # then set the web PHP version back in Site Tools

    Once you are confident (give it a week), reclaim the space:
      rm -rf $ROOT/old

    Future deploys are just:
      cd $ROOT && ./deploy.sh

EOF

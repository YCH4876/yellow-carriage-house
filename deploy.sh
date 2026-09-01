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

PHP="${PHP_BIN:-php}"
COMPOSER="${COMPOSER_BIN:-composer}"

# --- Preflight -------------------------------------------------------------

if ! command -v "$PHP" >/dev/null 2>&1; then
    echo "ERROR: php binary '$PHP' not found." >&2
    echo "       Set PHP_BIN to its full path, e.g. PHP_BIN=/usr/local/php83/bin/php" >&2
    exit 1
fi

if ! "$PHP" -r 'exit(PHP_VERSION_ID >= 80300 ? 0 : 1);' 2>/dev/null; then
    echo "ERROR: $PHP is $("$PHP" -r 'echo PHP_VERSION;' 2>/dev/null), but Laravel 13 needs 8.3+." >&2
    echo "       Set PHP_BIN to a newer binary, e.g. PHP_BIN=/usr/local/php83/bin/php" >&2
    exit 1
fi

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

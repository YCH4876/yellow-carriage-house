<?php

if (! function_exists('asset_v')) {
    /**
     * An asset URL with a cache-busting version derived from the file's mtime.
     *
     * Photos and stylesheets on this site are replaced in place, keeping the
     * same filename. Browsers therefore keep serving the copy they already
     * cached, and a visitor who has been here before sees the old picture
     * indefinitely - there is nothing in the URL to tell them it changed.
     * Appending the file's modification time changes the URL exactly when the
     * file changes, and never otherwise, so caching stays aggressive without
     * going stale.
     *
     * Some existing references use Windows-style backslashes. Browsers
     * normalise those in a URL but the filesystem does not, so they are
     * converted before the mtime lookup - otherwise the file would not be
     * found and no version would be appended.
     *
     * Falls back to a plain asset() URL when the file is missing, so a broken
     * path stays a visible 404 rather than becoming a confusing error here.
     */
    function asset_v(string $path): string
    {
        $normalised = str_replace('\\', '/', $path);
        $file = public_path($normalised);

        if (! is_file($file)) {
            return asset($normalised);
        }

        return asset($normalised).'?v='.filemtime($file);
    }
}

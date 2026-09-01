import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // This project's web root is "public_html" to match SiteGround's
            // document root. Without this the plugin would emit to "public".
            publicDirectory: 'public_html',
            refresh: true,
        }),
    ],
});

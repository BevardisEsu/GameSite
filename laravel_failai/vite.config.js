import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public_html/css/app.css',
                'public_html/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

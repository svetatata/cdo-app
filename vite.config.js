import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/vars.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/mainscript.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

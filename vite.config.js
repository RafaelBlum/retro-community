import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/retro-animation.js',
                'resources/css/landing.css',
                'resources/css/game.css',
                'resources/js/game.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

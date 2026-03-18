import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Importação obrigatória

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/retro-login.css', 'resources/js/retro-animation.js'],
            refresh: true,
        }),
        tailwindcss(), // Ativação obrigatória
    ],
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', '/resources/js/diabetesdiary.js', '/resources/css/diabetesdiary.css', 'resources/js/datetimepicker.js'],
            refresh: true,
        }),
    ],
});

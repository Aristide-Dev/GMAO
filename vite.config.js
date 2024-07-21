import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/main.css',
                'resources/js/app.js',

                // <!-- AUTRES -->
                'resources/css/file_viewer.css'
            ],
            refresh: true,
        }),
    ],
    build: {
        chunkSizeWarningLimit: 5000, // Par exemple, 5000 kB
    },
});

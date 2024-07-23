import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/main.css',
                'resources/js/app.js',
                // Icons
                'resources/assets/vendor/fonts/fontawesome.css',
                'resources/assets/vendor/fonts/tabler-icons.css',
                'resources/assets/js/forms-pickers.js',

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

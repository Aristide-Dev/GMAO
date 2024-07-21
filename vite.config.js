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
                'resources/assets/vendor/fonts/flag-icons.css',
                // Core CSS
                'resources/assets/vendor/css/rtl/core.css',
                'resources/assets/vendor/css/rtl/theme-default.css',
                'resources/assets/css/demo.css',
                // Vendors CSS
                'resources/assets/vendor/libs/node-waves/node-waves.css',
                'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/assets/vendor/libs/typeahead-js/typeahead.css',
                'resources/assets/vendor/libs/apex-charts/apex-charts.css',
                'resources/assets/vendor/libs/swiper/swiper.css',
                'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css',
                'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css',
                'resources/assets/vendor/libs/select2/select2.css',
                // 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.css',
                'resources/assets/vendor/libs/flatpickr/flatpickr.css',
                'resources/assets/vendor/libs/dropzone/dropzone.css',
                'resources/assets/vendor/libs/animate-css/animate.css',


                'resources/assets/vendor/css/pages/cards-advance.css',
                'resources/assets/vendor/js/helpers.js',
                'resources/assets/vendor/js/template-customizer.js',
                'resources/assets/js/config.js',
                // <!-- Core JS -->
                'resources/assets/vendor/libs/jquery/jquery.js',
                'resources/assets/vendor/libs/popper/popper.js',
                'resources/assets/vendor/js/bootstrap.js',
                'resources/assets/vendor/libs/node-waves/node-waves.js',
                'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
                'resources/assets/vendor/libs/hammer/hammer.js',
                'resources/assets/vendor/libs/i18n/i18n.js',
                'resources/assets/vendor/libs/typeahead-js/typeahead.js',
                'resources/assets/vendor/js/menu.js',
                'resources/assets/vendor/libs/dropzone/dropzone.js',
                // <!-- Vendors JS -->
                'resources/assets/vendor/libs/select2/select2.js',
                'resources/assets/vendor/libs/apex-charts/apexcharts.js',
                'resources/assets/vendor/libs/swiper/swiper.js',
                'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
                'resources/assets/vendor/libs/flatpickr/flatpickr.js',
                'resources/assets/vendor/libs/autosize/autosize.js',
                // <!-- Main JS -->
                'resources/assets/js/main.js',
                // <!-- Page JS -->
                'resources/assets/js/dashboards-analytics.js',
                'resources/assets/js/forms-selects.js',
                'resources/assets/js/ui-modals.js',
                'resources/assets/js/extended-ui-blockui.js',
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

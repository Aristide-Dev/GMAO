import './bootstrap';
import ApexCharts from 'apexcharts';

import lightGallery from 'lightgallery/lightgallery.min.js';
import 'lightgallery/css/lightgallery.css';

// Vous pouvez également ajouter des plugins si nécessaire
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';

document.addEventListener('DOMContentLoaded', function () {
    const lightGalleryElement = document.getElementById('lightgallery');
    if (lightGalleryElement) {
        lightGallery(lightGalleryElement, {
            plugins: [lgThumbnail, lgZoom],
        });
    }
});

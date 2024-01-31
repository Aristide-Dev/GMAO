<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $title ? $title." | " : '' }} {{ config('app.name', 'G-MAINTENANCE') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="/storage/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/storage/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/storage/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/storage/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/storage/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/dropzone/dropzone.css" />


    <!-- Page CSS -->
    <link rel="stylesheet" href="/storage/assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="/storage/assets/vendor/js/helpers.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/storage/assets/js/config.js"></script>


    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar ">
        <div class="layout-container">

            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/" class="app-brand-link">
                        <span class="app-brand-logo">
                            <img src="/storage/assets/img/logo.png" alt="logo" width="35%" />
                        </span>
                    </a>
                </div>
                @if(!empty($sidebar))
                    @switch($sidebar)
                        @case($sidebar == "demandeur")
                        @include('layouts.gmao.demandeur.sidebar')
                        @break

                        @case($sidebar == "prestataire")
                        @include('layouts.gmao.prestataire.sidebar')
                        @break

                        @case($sidebar == "admin")
                        @include('layouts.gmao.admin.sidebar')
                        @break

                        @case(2)
                        @break
                        @default
                        @include('layouts.gmao.sidebar')
                        @break
                    @endswitch
                @else
                    @include('layouts.gmao.sidebar')
                @endif


                <div class="menu-inner-shadow"></div>
            </aside>
            <!-- / Menu -->


            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.gmao.navbar')
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{ $slot }}
                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    @include('layouts.gmao.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Overlay -->
        {{-- <div class="layout-overlay layout-menu-toggle"></div> --}}

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="/storage/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/storage/assets/vendor/libs/popper/popper.js"></script>
    <script src="/storage/assets/vendor/js/bootstrap.js"></script>
    <script src="/storage/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/storage/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="/storage/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/storage/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="/storage/assets/vendor/js/menu.js"></script>
    <script src="/storage/assets/vendor/libs/dropzone/dropzone.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/storage/assets/vendor/libs/select2/select2.js"></script>
    <script src="/storage/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="/storage/assets/vendor/libs/swiper/swiper.js"></script>
    <script src="/storage/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/storage/assets/vendor/libs/flatpickr/flatpickr.js"></script>


    <!-- Main JS -->
    <script src="/storage/assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="/storage/assets/js/dashboards-analytics.js"></script>
    <script src="/storage/assets/js/forms-selects.js"></script>
    <script src="/storage/assets/js/charts-apex.js"></script>
    <script src="/storage/assets/js/forms-file-upload.js"></script>

    @livewireScripts
</body>
</html>


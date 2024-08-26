<!DOCTYPE html>
<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="/storage/assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {!! isset($title) ? $title." | " : '' !!} {{ config('app.name', 'G-MAINTENANCE') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link rel="stylesheet" href="/storage/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/dropzone/dropzone.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/spinkit/spinkit.css" />
    
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.422.delay" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="/storage/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/storage/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/storage/assets/css/demo.css" />
    {{-- @vite([
        // Icons
        'resources/assets/vendor/fonts/fontawesome.css',
        'resources/assets/vendor/fonts/tabler-icons.css',
        'resources/assets/vendor/fonts/flag-icons.css',
    ]) --}}


    @if(isset($custum_styles))
    {!! $custum_styles !!}
    @endif
    <!-- Page CSS -->
    {{-- <link rel="stylesheet" href="/storage/assets/vendor/css/pages/cards-advance.css" /> --}}

    <!-- Helpers -->
    {{-- <script src="storage/assets/vendor/js/helpers.js"></script> --}}

    {{-- <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  --> --}}
    {{-- <script src=""></script> --}}

    {{-- <script src="../../assets/vendor/js/template-customizer.js"></script> --}}

    
    <!-- Page CSS -->
    <link rel="stylesheet" href="/storage/assets/vendor/css/pages/cards-advance.css" />
    <!-- Helpers -->
    <script src="/storage/assets/vendor/js/helpers.js"></script>
    <script src="/storage/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/storage/assets/js/config.js"></script>
    
    @vite([
        'resources/js/app.js',
        'resources/js/file_viewer.js',
        'resources/css/app.css',
        'resources/css/main.css',
    ])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery.min.css">


    <!-- Styles -->
    @livewireStyles
</head>
<body>

    <!-- Layout wrapper -->
    <div id="layout-menu" class="layout-wrapper layout-content-navbar">
        <div class="min-h-screen layout-container">

            <!-- Menu -->
            <aside class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/" class="app-brand-link">
                        <span class="app-brand-logo">
                            <img src="{{ asset('storage/assets/img/logo.png') }}" alt="logo" width="35%" />
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                    </a>
                    
                    <div class="menu-inner-shadow"></div>
                    
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

                        @case($sidebar == "commercial")
                        @include('layouts.gmao.commercial.sidebar')
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
                        @include('layouts.alert_message')
                        {{ $slot }}
                    </div>
                    <!-- / Content -->



                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
                
                <!-- Footer -->
                @include('layouts.gmao.footer')
                <!-- / Footer -->
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
    
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

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
    <script src="/storage/assets/vendor/libs/autosize/autosize.js"></script>
    <script src="/storage/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>

    <script src="/storage/assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <!-- Main JS -->
    <script src="/storage/assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="/storage/assets/js/dashboards-analytics.js"></script>
    <script src="/storage/assets/js/forms-selects.js"></script>
    <script src="/storage/assets/js/charts-apex.js"></script>
    <script src="/storage/assets/js/forms-file-upload.js"></script>
    <script src="/storage/assets/js/forms-extras.js"></script>
    <script src="/storage/assets/js/cards-statistics.js"></script>
    <script src="/storage/assets/js/ui-modals.js"></script>
    <script src="/storage/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/storage/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.426.delay"></script>
    <script src="/storage/assets/js/forms-pickers.js"></script>

    <script>
        // Fonction générique pour afficher une image en grand
        // Set up modal functionality
        function displayImageInModal(imageId, modalId = 'myModal') {
            var modal = document.getElementById(modalId); 
            var img = document.getElementById(imageId);
            var modalImg = modal.querySelector(".modal-content");
            var captionText = modal.querySelector("#caption");
        
            // Ajoutez un événement de clic à l'image
            img.addEventListener('click', function() {
                modalImg.src = this.src; // Mettre à jour l'image de la modale avec l'image cliquée
                captionText.innerHTML = this.alt; // Mettre à jour la légende avec l'attribut alt de l'image cliquée
                modal.style.display = "block"; // Afficher la modale
            });
        
            var span = modal.querySelector(".close");
            span.onclick = function() {
                modal.style.display = "none";
            };
        
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        }
    </script>
  

    {{-- @vite([
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
        'resources/assets/js/forms-pickers.js',
  
    ]) --}}


    @if(isset($custum_scripts))
    {!! $custum_scripts !!}
    @endif

    @livewireScripts
    @livewireChartsScripts
</body>
</html>


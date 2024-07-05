<!DOCTYPE html>
<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="/storage/assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'G-MAINTENANCE') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite([
        'resources/js/app.js',
        'resources/css/app.css',
        'resources/css/main.css',
    ])
    </head>
    <body class="font-sans antialiased">
        <!-- Hero -->
        <div class="h-screen pb-10 bg-gradient-to-b from-blue-600 via-blue-400">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-24 space-y-8">
                <!-- Announcement Banner -->
                <div class="flex justify-center">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block p-1 border rounded-full shadow-md group bg-white/10 hover:bg-white/40 border-white/10 ps-4 focus:outline-none focus:ring-1 focus:ring-gray-600">
                            <p class="inline-block text-lg text-white uppercase animate-pulse me-2">
                                Tableau de Bord
                            </p>
                            <span
                                class="group-hover:bg-white/10 py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-white/10 font-semibold text-white text-sm">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block p-1 border rounded-full shadow-md group bg-black/10 hover:bg-black/40 border-white/10 ps-4 focus:outline-none focus:ring-1 focus:ring-gray-600">
                            <p class="inline-block text-lg text-white uppercase animate-pulse me-2">
                                Se connecter
                            </p>
                            <span
                                class="group-hover:bg-white/10 py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-white/10 font-semibold text-white text-sm">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </span>
                        </a>
                    @endauth
                    
                </div>
                
                <!-- End Announcement Banner -->
            
                <!-- Title -->
                <div class="max-w-3xl mx-auto text-center">
                    <h1 class="block text-4xl font-bold text-gray-200 uppercase sm:text-5xl md:text-6xl lg:text-7xl">
                        {{ config('app.name', 'G-MAINTENANCE') }}
                    </h1>
                </div>
                <!-- End Title -->
            </div>
        </div>
        <!-- End Hero -->
    </body>
</html>

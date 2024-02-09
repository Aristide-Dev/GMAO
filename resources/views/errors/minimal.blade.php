<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <style>
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
        
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <div class="relative flex justify-center min-h-screen items-top sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <div class="px-4 text-lg font-bold tracking-wider text-red-500 border-r border-gray-400">
                        @yield('code')
                    </div>

                    <div class="ml-4 text-lg tracking-wider text-gray-500 uppercase">
                        @yield('message')
                    </div>
                </div>
                

                <p class="mt-10 ml-4 text-gray-200 text-md">
                    Revenir sur la page d'accueil
                    <a href="{{ route('dashboard') }}" class="font-medium text-blue-600 underline dark:text-blue-500 hover:no-underline">
                        Cliquez ici 
                        <i class="fa fa-solid fa-house-user fa-2xl" style="color: #808080;"></i>
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>

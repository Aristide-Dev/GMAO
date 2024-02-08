<div class="flex flex-col items-center min-h-screen pt-6 mx-3 sm:justify-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white border-t rounded-lg shadow-2xl sm:max-w-md">
        {{ $slot }}
    </div>
</div>

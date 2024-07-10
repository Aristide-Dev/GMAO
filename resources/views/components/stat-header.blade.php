@props(['title' => 'Le titre', 'color'=> 'blue'])
<div
    class="flex items-center justify-between h-16 gap-1 p-0 overflow-hidden text-white bg-{{ $color }}-400 shadow shadow-gray-500 col-md-12">
    <div class="flex items-center justify-between w-50">
        <img src="/storage/assets/img/logo.png" class="h-full" alt="logo" width="15%" />
        <p class="w-full text-xl font-bold text-center uppercase">{{ $title }}</p>
    </div>
    @if($slot)
    <div class="w-50">
        {{ $slot }}
    </div>
    @endif
</div>

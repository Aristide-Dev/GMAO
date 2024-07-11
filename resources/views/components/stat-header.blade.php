@props(['title' => 'Le titre', 'color'=> 'blue', 'unique' => false])

@if($unique)
<div
    class="flex items-center w-full m-3 h-16 gap-1 p-0 overflow-hidden text-white bg-{{ $color }}-400 shadow shadow-gray-500 col-md-12">
    <div class="flex items-center justify-between  {{ $slot ? 'w-50':'col-12' }} flex-1">
        <img src="/storage/assets/img/logo.png" class="h-full" alt="logo" width="15%" />
        <p class="w-full text-xl font-bold text-center uppercase">{{ $title }}</p>
    </div>
</div>
@else
<div
    class="flex items-center justify-between h-16 gap-1 p-0 overflow-hidden text-white bg-{{ $color }}-400 shadow shadow-gray-500 col-md-12">
    <div class="flex items-center justify-between  {{ $slot ? 'w-50':'col-12' }} w-full">
        <img src="/storage/assets/img/logo.png" class="h-full" alt="logo" width="15%" />
        <p class="w-full text-xl font-bold text-center uppercase">{{ $title }}</p>
    </div>
    @if(!empty($slot))
    <div class="w-50">
        {{ $slot }}
    </div>
    @endif
</div>
@endif

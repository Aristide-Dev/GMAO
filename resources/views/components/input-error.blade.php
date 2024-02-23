@props(['for', 'bag'])

@php
    $errorBag = $bag ?? 'default';
@endphp

@error($for, $errorBag)
    <small {{ $attributes->merge(['class' => "text-red-600 text-danger"]) }}>{{ $message }}..!</small>
@enderror

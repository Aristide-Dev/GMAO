@props(['active'])

@php
$classes = ($active ?? false)
            ? 'menu-item active'
            : 'menu-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>

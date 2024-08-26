@props(['active', 'title' => 'Title Menu', 'icon' => '<i class="menu-icon tf-icons ti ti-smart-home"></i>'])

@php
$classes = ($active ?? false)
            ? 'menu-item active open'
            : 'menu-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        {!! $icon !!}
        <div data-i18n="{{ $title }}">{{ $title }}</div>
    </a>
    <ul class="menu-sub">
        {{ $slot }}
    </ul>
</li>

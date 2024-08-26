<x-gmao-layout>
    <x-slot name="title">{{ __('Zones') }}</x-slot>
    <x-slot name="title_desc">{{ __('Zones') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Zones'=> '']"/>


    <livewire:site-zones lazy="on-load" />
</x-gmao-layout>


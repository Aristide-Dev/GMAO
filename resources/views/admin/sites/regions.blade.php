<x-gmao-layout>
    <x-slot name="title">{{ __('Régions') }}</x-slot>
    <x-slot name="title_desc">{{ __('Régions') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Régions'=> '']"/>


        <livewire:site-regions lazy="on-load" />
</x-gmao-layout>


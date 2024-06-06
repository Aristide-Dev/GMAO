<x-gmao-layout>
    <x-slot name="title">{{ __('Creer Prestataires') }}</x-slot>
    <x-slot name="title_desc">{{ __('Creer Prestataires') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Prestataires'=> route('admin.prestataires.index'), 'Nouveau prestataire' => '']"/>

    <x-gmao.create-prestataire></x-gmao.create-prestataire>
</x-gmao-layout>


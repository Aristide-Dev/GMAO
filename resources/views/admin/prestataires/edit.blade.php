<x-gmao-layout>
    <x-slot name="title">{{ __('Editer Prestataire') }}</x-slot>
    <x-slot name="title_desc">{{ __('Editer Prestataire') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Prestataires'=> route('admin.prestataires.index'), 'Editer prestataire' => '']"/>

    <x-gmao.edit-prestataire :prestataire="$prestataire"/>
</x-gmao-layout>


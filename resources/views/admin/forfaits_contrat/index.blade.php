<x-gmao-layout>
    <x-slot name="title">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="title_desc">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Forfaits Contrat'=> '']"/>


    <livewire:admin.forfait-contrat-mensuel />

</x-gmao-layout>


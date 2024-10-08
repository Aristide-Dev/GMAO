<x-gmao-layout>
    <x-slot name="title">{{ __('ZONES & PRIORITES') }}</x-slot>
    <x-slot name="title_desc">{{ __('Administration des zones') }}</x-slot>
    <x-slot name="sidebar">commercial</x-slot>
    <x-breadcrumb :data="['Zones et Priorités'=> '']"/>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <livewire:zones-table action="commercial"/>
        <!--/ Hoverable Table rows -->
    </div>


</x-gmao-layout>

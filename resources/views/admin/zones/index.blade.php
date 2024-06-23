<x-gmao-layout>
    <x-slot name="title">{{ __('ZONES & PRIORITES') }}</x-slot>
    <x-slot name="title_desc">{{ __('Administration des zones') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Zones et Priorités'=> '']"/>


    <div class="mt-3 col-12">

        <div class="mb-4 col-4">
            <x-gmao.create-zone/>
        </div>
        <!-- Hoverable Table rows -->
        <livewire:zones-table />
        <!--/ Hoverable Table rows -->
    </div>


</x-gmao-layout>

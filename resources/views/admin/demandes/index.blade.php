<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Demandes'=> '']"/>





    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class=card-header row">
                <div class="mb-3 col-12">
                    <x-gmao.create-demande action="admin" :sites="$sites" :demandeurs="$demandeurs"/>
                </div>
                <div class="col-12">
                    <h5>Liste des demandes d'interventions</h5>
                </div>
            </div>

            {{-- <x-gmao.demande-list :demandes="$demandes" action="admin" /> --}}
            <livewire:demandes-table action="admin" />
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


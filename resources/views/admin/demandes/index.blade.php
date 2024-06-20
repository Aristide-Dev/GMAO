<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="custum_styles">

        @vite(['resources/css/file_viewer.css'])
    </x-slot>
    <x-breadcrumb :data="['Demandes'=> '']"/>

    <script src="/storage/js/file_viewer.js">

    </script>


<!-- La modale -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>



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


        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


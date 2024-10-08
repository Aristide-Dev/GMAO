<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>



    <!-- La modale -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>



    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <x-gmao.create-demande action="demandeur" :sites="$sites" />
                </div>
                <div class="col-12">
                    <h5>Vos demandes d'interventions</h5>
                </div>
            </div>


            <livewire:demandes-table action="demandeur" />



            <!--/ Hoverable Table rows -->
        </div>
    </div>
</x-gmao-layout>



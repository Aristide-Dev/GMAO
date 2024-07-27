<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>
    <x-breadcrumb :data="['Demandes'=> route('demandeur.demandes.index'), 'details' => '']"/>

    <div id="myShowDemandeModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <div class="mt-3 row">
        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">DEMANDE ET BONS DE TRAVAIL</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- Demande d'Intervention (DI) --}}
                    <x-gmao.demande :demande="$demande" />
                    {{-- Demande d'Intervention (DI) --}}

                    {{-- Bon De Travail (BT) --}}
                    @if (!empty($demande->bon_travails->first()))
                    <x-gmao.bt :bonTravail="$demande->bon_travails->first()" />
                    @endif
                    {{-- Bon De Travail (BT) --}}
                </div>
            </div>
        </div>

        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">RAPPORTS D'INTERVENTION</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- Rapport --}}
                    @if ($demande->bon_travails->first() && ($demande->bon_travails->first())->rapportsIntervention)
                    <x-gmao.ri :rapport_intervention="($demande->bon_travails->first())->rapportsIntervention" />
                    @endif
                    {{-- Rapport --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}


        {{-- Activity Timeline --}}
        {{-- <x-gmao.historique-interventions></x-gmao.historique-interventions> --}}
        {{-- Activity Timeline --}}

    </div>

    <x-slot name="custum_styles">

        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    <script src="/storage/js/file_viewer.js">
</x-gmao-layout>


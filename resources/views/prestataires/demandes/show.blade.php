<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>




    <div id="myShowDemandeModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>


    <div class="row">
        <div class="mb-4 col-12">
            <div class="justify-between gap-2 accordion-body d-flex">
                @if (
                        !empty($demande->bon_travails->last()) &&
                        ($demande->bon_travails->last())->status !== 'annulé' &&
                        ($demande->bon_travails->last())->status != 'rejeté' &&
                        ($demande->bon_travails->last())->status != 'Clôturé'
                    )
                        <x-gmao.create-rapport-constat :demande="$demande" :bonTravail="$demande->bon_travails->last()" />
                        <x-gmao.create-rapport-remplacement :demande="$demande" :bonTravail="$demande->bon_travails->last()" />

                @endif

            </div>
        </div>
    </div>

    <div class="row">
        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-10 offset-md-1 col-md-10 offset-lg-1">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">Details de la Requete</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- Demande d'Intervention (DI) --}}
                    <x-gmao.demande :demande="$demande" />
                    {{-- Demande d'Intervention (DI) --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}

        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">Details de la Requete</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- Bon De Travail (BT) --}}
                    @if (!empty($demande->bon_travails->last()))
                    <x-gmao.bt :bonTravail="$demande->bon_travails->last()" />
                    @endif
                    {{-- Bon De Travail (BT) --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}

        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">Details de la Requete</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- Rapport --}}
                    @if ($demande->bon_travails->last() && ($demande->bon_travails->last())->rapportsIntervention)
                    <x-gmao.ri :rapport_intervention="($demande->bon_travails->last())->rapportsIntervention" />
                    @endif
                    {{-- Rapport --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}


        {{-- Activity Timeline --}}
        {{-- <x-gmao.historique-interventions :bon_travails="$demande->bon_travails" /> --}}
        {{-- Activity Timeline --}}

    </div>

    <x-slot name="custum_styles">

        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    <script src="/storage/js/file_viewer.js">
        </x-gmao-layout>


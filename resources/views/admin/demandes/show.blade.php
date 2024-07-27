<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Demandes'=> route('admin.demandes.index'), 'suivi' => '']"/>

    <div id="myShowDemandeModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <div class="flex justify-end md:pr-20">
        <x-gmao.config.demandes-actions :demande="$demande"/>
    </div>

    <x-gmao.create-bt :zones="$zones" :demande="$demande" :prestataires="$prestataires" :btn="false"/>
    @if($demande->bon_travails->first() && ($demande->bon_travails->first())?->rapportsIntervention)
        <x-gmao.injection-piece :pieces="$pieces" :rapport_intervention="($demande->bon_travails->first())?->rapportsIntervention" :btn="false"/>
        <x-gmao.cloture-rapport :rapport_intervention="($demande->bon_travails->first())?->rapportsIntervention" :btn="false"/>
    @endif

    <br/>

    <div class="mt-3 row">
        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">DEMANDE</h5>
                    </div>
                    <x-gmao.config.demandes-actions-2 :demande="$demande"/>
                </div>
                <div class="card-body">
                    {{-- Demande d'Intervention (DI) --}}
                    <x-gmao.demande :demande="$demande" />
                </div>
            </div>
        </div>

        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">BONS DE TRAVAIL</h5>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Bon De Travail (BT) --}}
                    @if (!empty($demande->bon_travails->first()))
                        <x-gmao.bt :bonTravail="$demande->bon_travails->first()" />
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">RAPPORTS D'INTERVENTION</h5>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Rapport --}}
                    @if ($demande->bon_travails->first() && ($demande->bon_travails->first())->rapportsIntervention)
                        <x-gmao.ri :rapport_intervention="($demande->bon_travails->first())->rapportsIntervention" :pieces="$pieces" action="admin"/>
                    @endif
                </div>
            </div>
        </div>

        @if ($demande->oldBonTravails()->isNotEmpty())
            {{-- Activity Timeline --}}
            <x-gmao.historique-interventions :bon_travails="$demande->oldBonTravails()"/>
            {{-- Activity Timeline --}}
        @endif
    </div>

    <x-slot name="custum_styles">
        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    <script src="/storage/js/file_viewer.js"></script>
</x-gmao-layout>

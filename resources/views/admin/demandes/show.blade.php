<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    <div class="justify-between mx-1 row">
        <div class="my-3 col-md-4">
            <x-gmao.create-bt
                :zones="$zones"
                :demande="$demande"
                :prestataires="$prestataires"
            />
        </div>
        <div class="my-3 col-md-4">
            <x-gmao.injection-piece></x-gmao.injection-piece>
        </div>
        <div class="my-3 col-md-4">
            <x-gmao.cloture-rapport></x-gmao.cloture-rapport>
        </div>
    </div>
    <div class="row">
        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-7 col-md-12">
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

                    {{-- Bon De Travail (BT) --}}
                    @if (!empty($demande->bon_travails->last()))
                        <x-gmao.bt :bonTravail="$demande->bon_travails->last()" />
                    @endif
                    {{-- Bon De Travail (BT) --}}

                    {{-- Rapport --}}
                    @if ($demande->bon_travails->last())
                        <x-gmao.ri/>
                    @endif
                    {{-- Rapport --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}


        {{-- Activity Timeline --}}
        <x-gmao.historique-interventions></x-gmao.historique-interventions>
        {{-- Activity Timeline --}}

    </div>

</x-gmao-layout>


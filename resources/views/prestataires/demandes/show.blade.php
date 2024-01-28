<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>

    <div class="row">
        <div class="mb-4 col-12">
            <div class="mt-3 accordion" id="accordionExample">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="text-right shadow-lg accordion-button collapsed fw-bolder bg-label-primary" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            NOUVEAU RAPPORT
                        </button>
                    </h2>
                    <div id="accordionTwo" class="pt-5 shadow-xl accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="justify-between gap-2 accordion-body d-flex">
                            <x-gmao-create-rapport-constat></x-gmao-create-rapport-constat>
                            <x-gmao-create-rapport-remplacement></x-gmao-create-rapport-remplacement>
                        </div>
                    </div>
                </div>
            </div>
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
                    <x-gmao-demande></x-gmao-demande>
                    {{-- Demande d'Intervention (DI) --}}

                    {{-- Bon De Travail (BT) --}}
                    <x-gmao-bt></x-gmao-bt>
                    {{-- Bon De Travail (BT) --}}

                    {{-- Rapport --}}
                    <x-gmao-ri></x-gmao-ri>
                    {{-- Rapport --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}


        {{-- Activity Timeline --}}
        <x-gmao-historique-interventions></x-gmao-historique-interventions>
        {{-- Activity Timeline --}}

    </div>

</x-gmao-layout>


<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>


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
        <div class="col-lg-5 col-md-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="pt-1 m-0 mb-2 card-title me-2 d-flex align-items-center"><i class="ti ti-list-details ms-n1 me-2"></i> Historique des interactions</h5>
                </div>
                <div class="pb-0 card-body">
                    <ul class="mb-0 timeline ms-1">
                        <li class="timeline-item timeline-item-transparent ps-4">
                            <span class="timeline-point timeline-point-info"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">demande créée par <span class="fw-bolder">{{ fake()->name }}</span></h6>
                                </div>
                                <small class="fw-light text-info">Aujourd'hui</small>
                                <small class="fw-bolder text-info">à 10h00</small>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent ps-4">
                            <span class="timeline-point timeline-point-primary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header fw-light">
                                    <p class="w-full mb-0"><span class="fw-bold">D.I</span> transformée en <span class="fw-bold">BT</span> par <span class="fw-bold">{{ fake()->name }}</span></p>
                                </div>
                                <div class="timeline-header fw-light">
                                    <div>Numero BT: <span class="fw-bolder">BT000000{{ rand(1,200) }}</span></div>
                                </div>
                                <div class="timeline-header fw-light">
                                    <p class="w-full mb-0">demande transmise au prestataire (<span class="fw-bolder text-danger">{{ fake()->name }}</span>)</p>
                                </div>
                                <small class="fw-light text-primary">Aujourd'hui</small>
                                <small class="fw-bolder text-primary">à 10h15</small>
                            </div>
                        </li>


                        <li class="timeline-item timeline-item-transparent ps-4">
                            <span class="timeline-point timeline-point-warning"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <div>Numero BT: <span class="fw-bolder">BT000000{{ rand(1,200) }}</span> en cours de traitement par le prestataire</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Activity Timeline --}}

    </div>

</x-gmao-layout>


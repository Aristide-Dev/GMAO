<x-gmao-layout>
    <x-slot name="title">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="title_desc">{{ __('Details de la Demande') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>


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
                    {{-- Bon De Travail (BT) --}}
                    <ul class="p-3 m-0 mb-3 border rounded shadow-sm">
                        <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge bg-primary bg-label-primary">
                            Bon de Travail
                            <i class="fa-solid fa-circle-check fa-2xl" style="color: #63E6BE;"></i>
                            <i class="fa-solid fa-circle-check fa-2xl" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-circle-check fa-2xl" style="color: #FF0000;"></i>
                            <i class="fa-solid fa-circle-check fa-2xl" style="color: #74C0FC;"></i>
                        </div>

                        {{-- BT --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group">
                                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-primary fw-bold">
                                            <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                             B.T
                                        </h6>
                                    </div>
                                    <small class="mb-1 w-30">BT3030381</small>
                                </div>
                            </div>
                        </div>
                        {{-- BT --}}


                        {{-- Equipement, Marque & Numero de serie --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mt-1 border-0 border-end list-group-item">
                                            <div class="d-block w-100 justify-content-between">
                                                <p class="mb-1 text-left text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Equipement
                                                </p>
                                                <p class="mb-1 text-left">Distributteur 1</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mt-1 border-0 border-end list-group-item">
                                            <div class="w-100 justify-content-end">
                                                <p class="mb-1 text-end text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Marque
                                                </p>
                                                <p class="mb-1 text-end">CINO-TRUCK</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mt-1 border-0 border-end list-group-item">
                                            <div class="w-100 justify-content-end">
                                                <p class="mb-1 text-end text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Numero de serie
                                                </p>
                                                <p class="mb-1 text-end">654654654 465465 RM4</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{-- Equipement, Marque & Numero de serie --}}

                        {{-- Prestataire --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group">
                                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-primary fw-bold">
                                            <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                                             Prestataire
                                        </h6>
                                    </div>
                                    <small class="mb-1 text-black uppercase w-30 h4 fw-bold">GEP</small>
                                </div>
                            </div>
                        </div>
                        {{-- Prestataire --}}

                        {{-- Delais - Zone et Qualification --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group bg-label-light">
                                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-primary fw-bold">
                                            <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                                             Delais - Zone et Qualification
                                        </h6>
                                    </div>
                                    <div class="mb-1 w-30">
                                        <p class="m-0 text-lowercase d-flex h6">Zone: <span class="px-1 text-black text-uppercase fw-bold">Conakry</span></p>
                                        <p class="m-0 text-lowercase d-flex">urgence: <span class="mx-1 badge bg-warning">moyen</span></p>
                                        <p class="m-0 text-lowercase d-flex h6">Durée: <span class="px-1 text-black text-uppercase fw-bold">3h</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Delais - Zone et Qualification --}}

                        {{-- Date Echance --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group bg-label-danger">
                                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-primary fw-bold">
                                            <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                                             Date Echance
                                        </h6>
                                    </div>
                                    <small class="mb-1 w-30">25 fev 2024 <span class="fw-bold">à 15h30</span> </small>
                                </div>
                            </div>
                        </div>
                        {{-- Date Echance --}}

                    </ul>
                    {{-- Bon De Travail (BT) --}}



                    {{-- Rapport --}}
                    <ul class="p-3 m-0 mb-3 border rounded shadow-sm">
                        <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge bg-primary bg-label-primary">
                            Rapport
                            <i class="fa-solid fa-circle-check fa-2xl" style="color: #74C0FC;"></i>
                        </div>

                        {{-- Numero Rapport (RI) --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group">
                                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-primary fw-bold">
                                            <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                             RI                                        </h6>
                                    </div>
                                    <small class="mb-1 w-30">RI3030381</small>
                                </div>
                            </div>
                        </div>
                        {{-- Numero Rapport (RI) --}}

                        {{-- Temps prise en charge & KPIs --}}
                        <div class="my-2 col-12">
                            <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
                                <div class="row">
                                    <div class="p-0 col-6">
                                        <div class="mt-1 border-0 border-end list-group-item">
                                            <div class="d-block w-100 justify-content-between">
                                                <p class="mb-1 text-left text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Temps de prise en charge
                                                </p>
                                                <p class="mb-1 text-left fw-bold">2jours 4heures et 7min</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-0 m-0 rounded col-6 bg-label-danger">
                                        <div class="border-0 list-group-item">
                                            <div class="w-100 justify-content-end">
                                                <p class="mb-1 text-end text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    KPI
                                                </p>
                                                <p class="mb-1 text-end">Hors délais</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{-- Temps prise en charge & KPIs --}}


                        {{-- Numero Devis & Bon de Commande --}}
                        <div class="col-12">
                            <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mt-1 border-0 border-end list-group-item">
                                            <div class="d-block w-100 justify-content-between">
                                                <p class="mb-1 text-left text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Numero Devis
                                                </p>
                                                <p class="mb-1 text-left">DVi-556465465</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="border-0 list-group-item">
                                            <div class="w-100 justify-content-end">
                                                <p class="mb-1 text-end text-primary fw-bold">
                                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                                    Bon de Commande
                                                </p>
                                                <p class="mb-1 text-end">BC-021216</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{-- Numero Devis & Bon de Commande --}}
                    </ul>
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


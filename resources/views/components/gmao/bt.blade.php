@props(['bonTravail' => ''])

<div class="p-3 m-0 mb-3 border rounded shadow-sm" style="background-color: #F3F4F6;">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $bonTravail->statutColor() }}">
        Bon de Travail
        <br/>
        <br/>
        ( <span class="text-sm text-withe fw-medium">{{ $bonTravail->status }}</span> )
    </div>

    {{-- BT --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }}"></i>
                         B.T
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ $bonTravail?->bt_reference ?? '' }}</small>
            </div>
        </div>
    </div>
    {{-- BT --}}


    {{-- Equipement, Marque & Numero de serie --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
            <div class="row">
                <div class="col-6">
                    <div class="mt-1 border-0 border-end list-group-item">
                        <div class="d-block w-100 justify-content-between">
                            <p class="mb-1 text-left text-primary fw-bold">
                                <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }}"></i>
                                Equipement
                            </p>
                            <p class="mb-1 text-left">{{ $bonTravail?->equipement->name ?? '' }}</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-4">
                    <div class="mt-1 border-0 border-end list-group-item">
                        <div class="w-100 justify-content-end">
                            <p class="mb-1 text-end text-primary fw-bold">
                                <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }}"></i>
                                Marque
                            </p>
                            <p class="mb-1 text-end">CINO-TRUCK</p>
                        </div>
                    </div>
                </div> --}}

                <div class="col-6">
                    <div class="mt-1 border-0 border-end list-group-item">
                        <div class="w-100 justify-content-end">
                            <p class="mb-1 text-end text-primary fw-bold">
                                <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }}"></i>
                                Numero de serie
                            </p>
                            <p class="mb-1 text-end">{{ $bonTravail?->equipement->numero_serie ?? '' }}</p>
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
                <div class="d-flex w-100 justify-content-between justify-items-center">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }};"></i>
                         Prestataire
                    </h6>
                </div>
                <div class="p-0 d-flex w-100">
                    <small class="p-0 m-0 text-black uppercase w-50 h5 fw-bolder">({{ $bonTravail?->prestataire->slug ?? '' }})</small><br/>
                    <small class="mt-1 text-center text-black uppercase w-50 h6">{{ $bonTravail?->prestataire->name ?? '' }}</small>
                </div>
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
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }};"></i>
                         Delais - Zone et Qualification
                    </h6>
                </div>
                <div class="mb-1 w-75">
                    
                    <p class="m-0 text-lowercase d-flex h6 float-start">
                        Zone: <small class="px-1 mt-1 text-lg text-black text-uppercase fw-bold">{{ $bonTravail?->zone_name ?? '' }}</small>
                    </p>
                    <br>
                    
                    <p class="m-0 text-lowercase d-flex h6 float-start">
                        Durée: <span class="px-1 text-black text-uppercase fw-bold">{{ $bonTravail?->zone_delais ?? '' }}H</span>
                    </p><br>
                    <p class="m-0 text-lowercase d-flex h6 float-start">
                        urgence: <span class="mx-2 px-1 badge bg-{{ $bonTravail ? $bonTravail?->prioriteColor() : ''  }}">{{ $bonTravail ? $bonTravail?->prioriteText() : ''  }}</span>
                    </p>
                    <br>
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
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $bonTravail->statutColor() }};"></i>
                        Date Echance
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ $bonTravail ? \Carbon\Carbon::parse($bonTravail->date_echeance)->formatLocalized('%e %B %Y à %Hh %M') : '' }}</small>
            </div>
        </div>
    </div>
    {{-- Date Echance --}}

</div>

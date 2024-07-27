@props(['demande'])

@if (!isset($demande))
@php
throw new InvalidArgumentException('Le composant (demande) nécessite une prop "demande"');
@endphp
@endif

@php
$bonTravail = $demande->bon_travails->first() ?? null;
$rapport_intervention = $bonTravail?->rapportsIntervention ?? null;
@endphp
<div class="justify-center row">

    <div class="p-3 mx-1 border rounded shadow-sm col-md-5" style="background-color: #F3F4F6;">
        <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $demande->statutColor() }}">
            Demande d'Intervention
            <br />
            <br />
            ( <span class="text-sm text-white fw-medium">{{ $demande->status }}</span> )
        </div>

        {{-- Demande d'intervention (D.I) --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            D.I
                        </h6>
                    </div>
                    <small class="mb-1 text-lg font-bold w-30">{{ $demande->di_reference }}</small>
                </div>
            </div>
        </div>
        {{-- Demande d'intervention (D.I) --}}

        {{-- BT --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            B.T
                        </h6>
                    </div>
                    <small class="mb-1 text-lg font-bold w-30">{{ $bonTravail?->bt_reference ?? '' }}</small>
                </div>
            </div>
        </div>
        {{-- BT --}}

        {{-- REQUETE --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="overflow-hidden row">
                    <div class="ps-4 col-12">
                        <h6 class="mb-1 ps-2 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            DETAILS DE LA REQUETE
                        </h6>
                    </div>
                </div>
                <div class="px-4 mt-2 bg-white rounded col-12 min-h-[50px]">
                    <p class="w-full mx-3 mb-1 font-normal">{{ $bonTravail?->requete ?? '' }}</p>
                </div>
            </div>
        </div>
        {{-- REQUETE --}}

        {{-- Document --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            Document
                        </h6>
                    </div>
                    <img src="{{ asset($demande->document()) }}" alt="document" class="mb-1 rounded w-50" id="doc_image_url_in_show_demande" onclick="displayImageInModal('doc_image_url_in_show_demande', 'myShowDemandeModal')" width="100">
                </div>
            </div>
        </div>
        {{-- Document --}}

        {{-- Date et heure de déclaration --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            Date et heure de déclaration
                        </h6>
                    </div>
                    <small class="mb-1 w-30">{{ $bonTravail ? \Carbon\Carbon::parse($bonTravail->created_at)->formatLocalized('%e %B %Y à %Hh %M') : '' }}</small>
                </div>
            </div>
        </div>
        {{-- Date et heure de déclaration --}}

        {{-- BT --}}
        <div class="col-12">
            <div class="shadow-xs border-top border-top-3 list-group">
                <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary fw-bold">
                            @php
                            echo $demande->statutIcon('xl');
                            @endphp
                            Date Echance
                        </h6>
                    </div>
                    <small class="mb-1 w-30">{{ $bonTravail ? \Carbon\Carbon::parse($bonTravail->date_echeance)->formatLocalized('%e %B %Y à %Hh %M') : '' }}</small>
                </div>
            </div>
        </div>
        {{-- BT --}}
    </div>


    <div class="p-3 mx-1 border rounded shadow-sm col-md-5" style="background-color: #F3F4F6;">
        <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $rapport_intervention->statutColor() }}">
            Rapport d'intervention
            <br />
            <br />
            (<span class="text-sm text-white fw-medium">{{ $rapport_intervention->status }}</span>)
        </div>

        {{-- rapport_constat --}}
        @if($rapport_intervention->rapport_constats)
            @foreach ($rapport_intervention->rapport_constats as $rapport_constat)
                <x-gmao.rapport-constat :rapport_constat="$rapport_constat" :status_color="$rapport_intervention->statutColor()" />
            @endforeach
        @endif
        {{-- rapport_constat --}}


                    {{-- @dd($rapport_intervention->rapport_remplacement_piece) --}}
        {{-- rapport_remplacement_piece --}}
        @if($rapport_intervention->rapport_remplacement_piece)
            @foreach ($rapport_intervention->rapport_remplacement_piece as $rapport_remplacement_piece)
                <x-gmao.rapport-remplacement-piece :rapport_remplacement_piece="$rapport_remplacement_piece" :status_color="$rapport_intervention->statutColor()"/>
            @endforeach
        @endif
        {{-- rapport_remplacement_piece --}}



        {{-- rapport_injection_piece --}}
        @if(!empty($rapport_intervention->injection_pieces))
            @foreach ($rapport_intervention->injection_pieces as $injection_piece)
            <x-gmao.rapport-injection-piece :injection_piece="$injection_piece" :status_color="$rapport_intervention->statutColor()" action="prestataire"/>
            {{-- <livewire:injection-piece-card :injectionPiece="$injection_piece" :pieces="$pieces" :action="$action" /> --}}
            @endforeach

            @if (count($rapport_intervention->injection_pieces)> 1)
            <div class="p-1 text-center bg-white rounded shadow-xl d-flex w-100 justify-content-between">
                <h6 class="mb-1 text-gray-700 fw-bold">
                    Total Injections
                </h6>
                <p class="mb-1 text-xl fw-bold">{{ number_format(intval($rapport_intervention->injection_pieces_amounts()),0,'',' ') }} F</p>
            </div>
            @endif
        @endif
        {{-- rapport_injection_piece --}}

        {{-- Temps prise en charge & KPIs --}}
        <div class="my-2 col-12">
            <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
                <div class="row">
                    <div class="p-0 m-0 col-6">
                        <div class="mt-1 border-0 border-end list-group-item">
                            <div class="d-block w-100 justify-content-between">
                                <p class="mb-1 text-left text-primary fw-bold">
                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                    Temps de prise en charge
                                </p>
                                <p class="mb-1 text-left fw-bold">{{ $rapport_intervention->temps_prise_en_charge ?? '---' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-0 m-0 rounded col-6 bg-label-{{ $rapport_intervention->kpi ?'success':'danger' }}">
                        <div class="border-0 list-group-item">
                            <div class="w-100 justify-content-end">
                                <p class="mb-1 text-end text-primary fw-bold">
                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                    KPI
                                </p>
                                <p class="mb-1 text-end">{{ ($rapport_intervention->kpi != null)?$rapport_intervention->kpi ?'Dans les delais':'Hors delais':'---' }}</p>
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
                    <div class="p-0 m-0 col-6 ">
                        <div class="mt-1 border-0 border-end list-group-item">
                            <div class="d-block w-100 justify-content-between">
                                <p class="mb-1 text-left text-primary fw-bold">
                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                    Numero Devis
                                </p>
                                <p class="mb-1 text-left">{{ $rapport_intervention->numero_devis ?? '---' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-0 m-0 col-6 ">
                        <div class="border-0 list-group-item">
                            <div class="w-100 justify-content-end">
                                <p class="mb-1 text-end text-primary fw-bold">
                                    <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                    Bon de Commande
                                </p>
                                <p class="mb-1 text-end">{{ $rapport_intervention->bon_commande ?? '---' }}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        {{-- Numero Devis & Bon de Commande --}}
    </div>
</div>

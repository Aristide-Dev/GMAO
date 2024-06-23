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

    <x-gmao.config.demandes-actions :demande="$demande"/>

    <x-gmao.create-bt :zones="$zones" :demande="$demande" :prestataires="$prestataires" :btn="false"/>
    @if($demande->bon_travails->last() && ($demande->bon_travails->last())?->rapportsIntervention)
        <x-gmao.injection-piece :pieces="$pieces" :rapport_intervention="($demande->bon_travails->last())?->rapportsIntervention" :btn="false"/>
        <x-gmao.cloture-rapport :rapport_intervention="($demande->bon_travails->last())?->rapportsIntervention" :btn="false"/>
    @endif


    <br/>

    <div class="justify-between mx-1 row">


        {{-- @if (
                !$demande->bon_travails->last() ||
                ($demande->bon_travails->last())->status == 'annulé' ||
                ($demande->bon_travails->last())->status == 'rejeté'
            )
        <div class="my-3 col-md-4">
            <x-gmao.create-bt :zones="$zones" :demande="$demande" :prestataires="$prestataires" />
        </div>
        @endif --}}

        {{-- Si il ya un bon de travail et qu'il existe un rapport d'intervention --}}
        {{-- @if(
            $demande->bon_travails->last() &&
            ($demande->bon_travails->last())->rapportsIntervention &&
            ($demande->bon_travails->last())->status != 'annulé' &&
            ($demande->bon_travails->last())->status != 'rejeté' &&
            ($demande->bon_travails->last())->status != 'terminé'
        )
            <div class="my-3 col-md-4">
                <x-gmao.injection-piece :pieces="$pieces" :rapport_intervention="($demande->bon_travails->last())->rapportsIntervention"/>
            </div>

            <div class="my-3 col-md-4">
                <x-gmao.cloture-rapport :rapport_intervention="($demande->bon_travails->last())->rapportsIntervention" />
            </div>
        @endif --}}
    </div>

    <div class="mt-3 row">
        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-10 offset-md-1 col-md-10 offset-lg-1">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">DEMANDE</h5>
                        {{-- <small class="text-muted">8.52k Social Visiters</small> --}}
                    </div>
                    <div class="dropdown">
                        <button class="p-0 btn" type="button" id="demandeActionsPanel" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="demandeActionsPanel">
                            <a class="text-white bg-blue-400 dropdown-item hover:bg-blue-600" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#create-bt-offcanvas" align="right">
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span>NOUVEAU BON DE TRAVAIL</span>
                            </a>
    
                            <a class="text-white bg-violet-400 dropdown-item hover:bg-violet-600" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#injection-piece-offcanvas" align="right">
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span>INJECTION DE PIECE</span>
                            </a>
    
                            <a class="text-white bg-green-400 dropdown-item hover:bg-green-600" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#cloture-rapport-offcanvas" align="right">
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span>CLOTURER LA REQUETE</span>
                            </a>
    
                            <hr class="mx-2 mt-2 mb-4 border-gray-300 border-1 rounded-xl">
    
                            <a class="text-white bg-yellow-400 dropdown-item hover:bg-yellow-600"
                                href="{{route('admin.demandes.edit',$demande)}}">
                                <i class="ti ti-edit me-0 me-sm-1 ti-xs"></i>
                                <span>EDITER</span>
    
                            </a>
                            <form action="{{route('admin.demandes.destroy',$demande)}}" method="post"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ? cette action est irréversible!');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white bg-red-400 dropdown-item hover:bg-red-600">
                                    <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                                    <span>SUPPRIMER</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Demande d'Intervention (DI) --}}
                    <x-gmao.demande :demande="$demande" />
                    {{-- Demande d'Intervention (DI) --}}
                </div>
            </div>
        </div>

        {{-- Details de la Requete --}}
        <div class="mb-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0">BONS DE TRAVAIL</h5>
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
                    @if ($demande->bon_travails->last() && ($demande->bon_travails->last())->rapportsIntervention)
                    <x-gmao.ri :rapport_intervention="($demande->bon_travails->last())->rapportsIntervention" :pieces="$pieces"/>
                    @endif
                    {{-- Rapport --}}
                </div>
            </div>
        </div>
        {{--/ Details de la Requete --}}


        
        @if ($demande->oldBonTravails())
            {{-- Activity Timeline --}}
            <x-gmao.historique-interventions :bon_travails="$demande->oldBonTravails()"/>
            {{-- Activity Timeline --}}
        @endif

    </div>



    <x-slot name="custum_styles">

        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    <script src="/storage/js/file_viewer.js">
</x-gmao-layout>


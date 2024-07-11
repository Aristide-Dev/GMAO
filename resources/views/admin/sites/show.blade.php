<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur le Site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Sites'=> route('admin.sites.index'), ''.$site->name.'' => '']"/>
    
    <div class="row">
        <livewire:site-status-switcher :site="$site" />
        
        <div class="mb-4 col-lg-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0 text-xl font-bold me-2">{{ $site->name }}</h5>
                        <p>
                            registre: <small class="font-bold uppercase">{{ $site->registre }}</small>
                        </p>
                    </div>
                    <a href="{{ route('admin.sites.edit', $site) }}" class="btn btn-warning">
                        editer
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="mb-4 col-lg-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0 font-bold me-2">{{ number_format($site->calculateTotalForfaitContrat(), 2, '.', ' ')
                            }} F</h5>
                        <small>forfait contrat</small>
                    </div>
                    <div class="card-icon">
                        <span class="p-2 badge bg-label-warning rounded-pill">
                            <i class="ti ti-brand-cashapp ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 col-lg-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0 font-bold me-2">{{ count($site->equipements) }}</h5>
                        <small>Equipements</small>
                    </div>
                    <div class="card-icon">
                        <span class="p-2 badge bg-label-primary rounded-pill">
                            <i class='ti ti-server ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 col-lg-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0 font-bold me-2">{{ count($site->demande_interventions) }}</h5>
                        <small>Demandes (D.I)</small>
                    </div>
                    <div class="card-icon">
                        <span class="p-2 badge bg-label-success rounded-pill">
                            <i class='ti ti-chart-pie-2 ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Cards with few info -->
    </div>

    <div class="mb-5 row">
        <div class="col-md-12">
            <livewire:equipement-search :site="$site">
        </div>
    </div>

    {{-- <h1 class="text-3xl fw-bold">{{ $site->name }}</h1> --}}

    <div class="row">
        <div class="mb-4 col-md-4 h-100">
            <div class="h-100 card" style="background-image: url('{{ Storage::url("svg/station_service.svg") }}'); background-size:cover; background-position:center;">
                <div class="mx-auto rounded-lg bg-gray-950/60 row h-100">
                    <div class="mb-3 rounded-lg h-100 col-12 ">
                        <div class="pb-3 mb-3 card-body text-start ps-sm-0">
                            <x-gmao.add-equipement :site="$site"/>
                            <p class="mt-1 mb-0 font-bold text-white hover:text-red-500">Ajouter un equipement si il n'existe pas encore</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <x-gmao.type-equipements-list action='admin' :site="$site"/>

    </div>


  </x-gmao-layout>



<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur le Site') }}</x-slot>
    <x-slot name="sidebar">commercial</x-slot>
    <x-breadcrumb :data="['Sites'=> route('commercial.sites.index'), 'details' => '']"/>

    <div class="row">

        <div class="mb-4 col-lg-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mb-0 card-title">
                        <h5 class="mb-0 text-xl font-bold me-2">{{ $site->name }}</h5>
                        <p>
                            registre: <small class="font-bold uppercase">{{ $site->registre }}</small>
                        </p>
                    </div>
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

    

    <div class="row">
        <div class="mb-4 col-md-12 h-[308px]">
            <div class="border shadow-3xl shadow-gray-500 h-100 card" style="background-image: url('{{ Storage::url("assets/img/sog/station_1.jpg") }}'); background-size:cover; background-position:center;">
                <div class="mx-auto rounded-lg row h-100">
                    <div class="mb-3 rounded-lg h-100 col-12 ">
                        <div class="pb-3 mb-3 card-body text-start ps-sm-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <x-gmao.type-equipements-list action='commercial' :site="$site"/>
    </div>

  </x-gmao-layout>



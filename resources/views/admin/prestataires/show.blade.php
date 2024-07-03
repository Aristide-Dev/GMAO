<x-gmao-layout>
    <x-slot name="title">{{ __('Prestataires') }}</x-slot>
    <x-slot name="title_desc">
        <div class="justify-center mx-3 d-block">
            <p class="p-0 m-0">{{ $prestataire->name }}</p>
            <small class="p-0 m-0">{{ $prestataire->slug }}</small>
        </div>
    </x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Prestataires'=> route('admin.prestataires.index'), 'Détails'=> '']"/>

    @php
    $statuts = [
        [
            'statut' => 'en attente de validation',
            'color' => 'warning',
            'signe' => '',
            'other-color' => '',
            'value' => '',
        ],
        [
            'statut' => 'transmise au prestataire',
            'color' => 'primary',
            'signe' => '',
            'other-color' => '',
            'value' => "",
        ],
        [
            'statut' => 'annulée',
            'color' => 'danger',
            'signe' => '',
            'other-color' => 'danger',
            'value' => '',
        ],
        [
            'statut' => 'rejettée',
            'color' => 'danger',
            'signe' => '-',
            'other-color' => 'danger',
            'value' => number_format(rand(500000,15000000), 2, '.', " "),
        ],
        [
            'statut' => 'terminé',
            'color' => 'success',
            'signe' => '+',
            'other-color' => 'success',
            'value' => number_format(rand(500000,15000000), 2, '.', " "),
        ],
    ];

    $colors =
    [
    "primary",
    "danger",
    "warning",
    "success",
    ]
    @endphp

    <div class="justify-between m-3 row">
        <div class="justify-center col-md-4">
            <x-gmao.create-presta-admin :prestataire="$prestataire"/>
        </div>
        <div class="justify-center col-md-4">
            <x-gmao.create-presta-agent :prestataire="$prestataire"/>
        </div>
    </div>

    <div class="p-2 mx-1 border shadow-lg bg-light">
        <h3>Indice de performance</h3>
        <div class="justify-between p-0 m-0 row d-flex">

            <div class="p-3 bg-white rounded col-md-4">
                <div class="gap-1 d-flex align-items-center">
                    <div class="p-1 rounded badge bg-label-danger"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Ce Mois-Ci</h6> -
                    <p class="mb-0 badge bg-dark d-end">Fev 2024</p>
                </div>
                <h4 class="pt-1 my-2">20%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="border progress w-75" style="height:4px">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="mt-0 float-end badge bg-danger">Mauvais</span>
                </div>
            </div>

            <div class="p-3 bg-white border rounded col-md-4">
                <div class="gap-1 d-flex align-items-center">
                    <div class="p-1 rounded badge bg-label-warning"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Cette Année</h6> -
                    <p class="mb-0 badge bg-dark d-end">2024</p>
                </div>
                <h4 class="pt-1 my-2">35%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="progress w-75" style="height:4px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="mt-0 float-end badge bg-warning">Moyen</span>
                </div>
            </div>

            <div class="p-3 bg-white border rounded col-md-4">
                <div class="gap-1 d-flex align-items-center">
                    <div class="p-1 rounded badge bg-label-primary"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Général</h6> -
                    <p class="mb-0 badge bg-dark d-end">2023 - 2024</p>
                </div>
                <h4 class="pt-1 my-2">80%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="progress w-75" style="height:4px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="mt-0 float-end badge bg-primary">Bon</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 row">
        <div class="card-body">
            <div class="row">
                <!-- User List Style -->
                <div class="mb-4 col-12 col-lg-6 mb-xl-0">
                    <small class="text-lg text-light fw-medium">Administrateur (gerant)</small>
                    <div class="mt-3 demo-inline-spacing">
                        <div class="list-group">
                            <div class="bg-white cursor-pointer list-group-item list-group-item-action d-flex align-items-center">
                                @if ($prestataire->admin())
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <div class="user-info">
                                            <h6 class="mb-1 font-bold">{{ $prestataire->admin()->first_name }} {{ $prestataire->admin()->last_name }}</h6>
                                        </div>
                                        <div class="add-btn">
                                            <a href="{{ route('admin.utilisateurs.show', $prestataire->admin()) }}" class="btn btn-warning btn-sm">Voir +</a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <h3>Aucun  gerant</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ User List Style -->

                <!-- User List Style -->
                <div class="mb-4 col-12 col-lg-6 mb-xl-0">
                    <small class="text-lg text-light fw-medium">Liste des agents du prestataire</small>
                    <div class="mt-3 demo-inline-spacing">
                        <div class="bg-white list-group">

                            @forelse ($prestataire->agents() as $agent)
                                <div class="cursor-pointer list-group-item list-group-item-action d-flex align-items-center">
                                    <div class="w-100">
                                        <div class="">
                                            <div class="user-info">
                                                <h6 class="mb-1 font-bold">{{ $agent->first_name }} {{ $agent->last_name }}</h6>
                                            </div>
                                            <div class="justify-start gap-3 d-flex">
                                                <p class="text-mute">{{ $agent->email }}</p>
                                                -
                                                <p class="text-mute">{{ $agent->telephone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="cursor-pointer list-group-item list-group-item-action d-flex align-items-center">
                                    <h3 class="text-center">Aucun</h3>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
                <!--/ User List Style -->
            </div>


            {{-- <div class="mt-5 row">


                <div class="mt-4 mb-4 col-12 col-md-12 mb-md-2">
                    <p class="text-light fw-medium">Rescentes intervetions du prestataire</p>
                    <div class="bg-white table-responsive">
                        <table class="table table-borderless border-top">
                            <thead class="border-bottom">
                                <tr>
                                    <th>CARD</th>
                                    <th>DATE DE CREATION</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prestataire->bon_travails as $bonTravail)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.demandes.show', $bonTravail->demande) }}" class="justify-content-start align-items-center">
                                            <p class="m-0 ">
                                                {{ $bonTravail->di_reference }}
                                            </p>
                                            <div class="d-flex flex-column">
                                                <small class="text-muted">{{ $bonTravail->bt_reference }}</small>
                                                <small class="text-muted">RI0000{{ rand(1,200) }}</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-medium text-nowrap">17 Mar 2022</p>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                        $st = $statuts[rand(0,4)];
                                        @endphp
                                        <span class="me-1 text-nowrap">
                                            <span class="badge bg-label-{{ $st['color'] }}">{{ $st['statut'] }}</span>
                                            <small class="mb-0 fw-medium text-{{ $st['other-color'] }}  text-nowrap">
                                                {{ $st['signe'] }}{{ $st['value'] }}
                                            </small>
                                        </span>
                                    </td>
                                    </tr>
                                @empty
                                    <h3 class="text-center">Aucun</h3>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-gmao-layout>


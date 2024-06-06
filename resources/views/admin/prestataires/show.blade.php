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
        <div class="mb-4 col-12 col-md-6 mb-md-2">
            <p class="text-light fw-medium">Administrateur</p>
            <div class="mt-3 accordion" id="prestataireAdminListAccordion">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="prestataireAgentListheadingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#prestataireAdminListaccordionThree" aria-expanded="false" aria-controls="prestataireAdminListaccordionThree">
                            Voir l'Administrateur
                        </button>
                    </h2>
                    <div id="prestataireAdminListaccordionThree" class="accordion-collapse collapse" aria-labelledby="prestataireAgentListheadingThree" data-bs-parent="#prestataireAdminListAccordion">
                        <div class="overflow-hidden accordion-body">
                            <div class="w-auto table-responsive">
                                <table class="table table-borderless border-top">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th>Nom & Prénoms</th>
                                            <th class="px-1 py-0 text-left">Date D'ajout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $admin = $prestataire->admin();
                                        @endphp

                                        @if($admin)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.utilisateurs.show', $admin) }}" class="d-flex align-items-center mt-lg-3">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-auto rounded-circle">
                                                            <path fill="#B197FC" d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-0">{{ $admin->last_name }} {{ $admin->first_name }}</h6>
                                                        <small class="text-truncate text-muted">{{ $admin->email }}</small>
                                                        <small class="text-truncate text-muted">{{ $admin->telephone }}</small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <p class="mb-0 fw-medium">{{ $admin->created_at->formatLocalized('%e %B %Y à %Hh %M') }}</p>
                                            </td>
                                        </tr>
                                        @else
                                            Aucun
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-4 col-12 col-md-6 mb-md-2">
            <p class="text-light fw-medium">Liste des agents du prestataire</p>
            <div class="mt-3 accordion" id="prestataireAgentListAccordion">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="prestataireAgentListheadingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#prestataireAgentListaccordionThree" aria-expanded="false" aria-controls="prestataireAgentListaccordionThree">
                            Afficher la liste des agents
                        </button>
                    </h2>
                    <div id="prestataireAgentListaccordionThree" class="accordion-collapse collapse" aria-labelledby="prestataireAgentListheadingThree" data-bs-parent="#prestataireAgentListAccordion">
                        <div class="overflow-hidden accordion-body">
                            <div class="w-auto table-responsive">
                                <table class="table table-borderless border-top">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th>Agent</th>
                                            <th class="px-1 py-0 text-left">Interventions</th>
                                            <th class="px-1 py-0 text-left">Performences</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($prestataire->agents() as $agent)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.utilisateurs.show', $agent) }}" class="d-flex align-items-center mt-lg-3">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-auto rounded-circle">
                                                            <path fill="#B197FC" d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-0">{{ $agent->first_name }} {{ $agent->last_name }}</h6>
                                                        <small class="text-truncate text-muted">{{ $agent->email }}</small>
                                                        <small class="text-truncate text-muted">{{ $agent->telephone }}</small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <p class="mb-0 fw-medium">33</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="mb-0 fw-medium badge bg-{{ $colors[rand(0,3)] }}">{{ rand(0,100) }} %</p>
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
                </div>
            </div>
        </div>


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
    </div>



</x-gmao-layout>


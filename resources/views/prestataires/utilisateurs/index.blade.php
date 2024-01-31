<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateur') }}</x-slot>
    <x-slot name="title_desc">{{ __('Utilisateur') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>


    @php
    $statuts = [
        [
            'statut' => 'actif',
            'color' => 'success',
        ],
        [
            'statut' => 'désactivé',
            'color' => 'danger',
        ],
    ];
    @endphp


    <x-gmao-create-user/>

    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="col-3">
                    <h5>Vos Utilisateur</h5>
                </div>
                <div class="col-6">
                </div>
                <div class="mb-3 col-3 right">
                    <button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                        <span class="d-none d-sm-inline-block">Nouvelle Utilisateur</span>
                        <span class="d-md-none">Ajouter</span>
                    </button>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos Utilisateur</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th class="text-left">Domaine d'expertise</th>
                            <th class="text-left">Compétences</th>
                            <th>Status</th>
                            <th class="p-2">action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @for ($i = 0; $i < 30; $i++)
                            <tr>
                                <td>
                                    {{ $i+1 }}
                                </td>
                                <td>
                                    <span class="fw-bold">Yassine</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Diallo</span>
                                </td>
                                <td class="text-left">
                                    <a href="{{ route('prestataires.utilisateurs.show', rand()) }}">yassine@gmail.com</a>
                                </td>
                                <td>
                                    <span class="fw-bold">623176862</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Génie Info</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Developpeur</span>
                                </td>
                                <td>
                                    @php
                                        $st = $statuts[rand(0,1)];
                                    @endphp
                                    <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                                </td>
                                <td class="text-left">
                                    <a href="http://" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="http://" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th class="text-left">Domaine d'expertise</th>
                            <th class="text-left">Compétences</th>
                            <th>Status</th>
                            <th class="p-2">action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


            @for ($i = 0; $i < 30; $i++)
            <div class="p-2 m-2 mb-4 border rounded-lg shadow card d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">DI0000{{ rand(1,200) }}</h5>
                        <div class="card-title-elements ms-auto">
                            <button type="button" class="btn btn-icon btn-sm btn-danger">
                                <span class="tf-icon ti-xs ti ti-brand-shopee"></span>
                            </button>
                        </div>
                    </div>
                    <h6 class="card-title"><span class="h5">site</span>: <span class="text-muted">{{ fake()->name }}</span></h6>
                    <div class="mb-3 card-subtitle text-muted"><span class="h6">Equipement: </span>{{ fake()->name }}</div>
                    <div class="mb-3 card-subtitle">
                        @php
                        $st = $statuts[rand(0,1)];
                        @endphp
                        <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                    </div>

                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="{{ route('demandeur.demandes.show', rand(1,5)) }}" class="card-link btn btn-primary">Details</a>
                </div>
            </div>
            @endfor


        <!--/ Hoverable Table rows -->
    </div>

</x-gmao-layout>


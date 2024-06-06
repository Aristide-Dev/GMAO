<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['utilisateurs'=> '']"/>


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
                    <x-gmao.create-user/>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos Utilisateur</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Prenom & Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th class="text-left">Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($utilisateurs as $key => $utilisateur)
                        <tr>
                            <td>
                                <a href="{{ route('admin.utilisateurs.show', $utilisateur) }}">{{ $key+1 }}</a>
                            </td>
                            <td>
                                <a class="fw-bold"href="{{ route('admin.utilisateurs.show', $utilisateur) }}">{{ $utilisateur->first_name }} {{ $utilisateur->last_name }}</</a>
                            </td>
                            <td class="text-left">
                                {{ $utilisateur->email }}
                            </td>
                            <td>
                                <span class="fw-bold">{{ $utilisateur->telephone }}</span>
                            </td>
                            <td>
                                @switch($utilisateur->role)
                                    @case('admin')
                                        <span class="fw-bold text-primary">Admin</span>
                                        @break
                                    @case('maintenance')
                                        <span class="fw-bold text-info">Agent Maintenance</span>
                                        @break
                                    @case('demandeur')
                                        <span class="fw-bold text-secondary">Demandeur</span>
                                        @break
                                    @default
                                    <span class="fw-bold text-secondary">{{ $utilisateur?->role }}</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @php
                                    $st = $statuts[rand(0,1)];
                                @endphp
                                <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                            </td>
                        </tr>
                        @empty
                            <h3 class="mt-5 text-center">Aucun utilisateur trouvé</h3>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Prenom & Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th class="text-left">Domaine d'expertise</th>
                            <th>Status</th>
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


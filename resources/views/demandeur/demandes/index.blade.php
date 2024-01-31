<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>

    @php
    $statuts = [
        [
            'statut' => 'en attente de validation',
            'color' => 'warning',
        ],
        [
            'statut' => 'transmise au prestataire',
            'color' => 'primary',
        ],
        [
            'statut' => 'annulée',
            'color' => 'danger',
        ],
        [
            'statut' => 'rejettée',
            'color' => 'danger',
        ],
    ];
    @endphp




    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <x-gmao-create-demande></x-gmao-create-demande>
                </div>
                <div class="col-12">
                    <h5>Vos demandes d'interventions</h5>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos demandes d'interventions</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Equipement</th>
                            <th class="py-2">Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @for ($i = 0; $i < 30; $i++)
                            <tr>
                                <td>
                                    {{ $i+1 }}
                                </td>
                                <td>
                                    <span class="fw-bold">DI0000{{ rand(1,200) }}</span>
                                </td>
                                <td class="text-left">
                                    <a href="{{ route('demandeur.demandes.show', rand()) }}">St {{ fake()->name }}</a>
                                </td>
                                <td class="text-left">{{ fake()->name }}</td>
                                <td class="py-2">
                                    {{ Illuminate\Support\Str::limit(fake()->paragraph, 20, $end = ' ...') }}
                                </td>
                                <td>
                                    @php
                                        $st = $statuts[rand(0,3)];
                                    @endphp
                                    <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Equipement</th>
                            <th class="p-2">Description</th>
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
                        $st = $statuts[rand(0,3)];
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


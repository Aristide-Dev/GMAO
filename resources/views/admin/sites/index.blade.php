<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Sites') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Liste des sites</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des sites</caption>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Site</th>
                            <th>Registre</th>
                            <th>Forfait Contrat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                        $registres = ['contrat','réseau', 'autre'];
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

                        @for ($i = 0; $i < 30; $i++)
                        <tr>
                            <td>
                                {{ $i+1 }}
                            </td>
                            <td>
                                <a href="{{ route('admin.sites.show', rand()) }}">St {{ fake()->name }}</a>
                            </td>
                            <td>
                                {{ $registres[rand(0,2)] }}
                            </td>
                            <td>
                                <span class="fw-bold">
                                    {{ number_format(rand(50000,15000000), 2, '.', ' ') }} GNF
                                </span>
                            </td>
                            <td>
                                @php
                                    $st = $statuts[rand(0,1)];
                                @endphp
                                <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Site</th>
                            <th>Registre</th>
                            <th>Forfait Contrat</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


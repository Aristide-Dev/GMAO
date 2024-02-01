<x-gmao-layout>
    <x-slot name="title">{{ __('Prestataires') }}</x-slot>
    <x-slot name="title_desc">{{ __('Prestataires') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    @php
    $indices_performance = [
        [
            'statut' => 'Mauvais',
            'color' => 'danger',
            'value' => rand(0,100),
        ],
        [
            'statut' => 'Moyen',
            'value' => rand(0,100),
            'color' => 'warning',
        ],
        [
            'statut' => 'Bon',
            'value' => rand(0,100),
            'color' => 'primary',
        ],
        [
            'statut' => 'Excellent',
            'value' => rand(0,100),
            'color' => 'success',
        ],
    ];
    @endphp




    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <x-gmao.create-prestataire action="admin"></x-gmao.create-prestataire>
                </div>
                <div class="col-12">
                    <h5>Liste des prestataires</h5>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des prestataires</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Entreprise</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Telephone</th>
                            <th class="text-left">Indice de performance</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @for ($i = 0; $i < 30; $i++)
                            <tr>
                                <td>
                                    {{ $i+1 }}
                                </td>
                                <td>
                                    <span class="fw-bold">{{ fake()->name }}</span>
                                </td>
                                <td class="text-start">
                                    <a href="{{ route('admin.prestataires.show', rand()) }}">{{ fake()->email }}</a>
                                </td>
                                <td class="text-start">{{ fake()->phoneNumber }}</td>
                                <td class="text-start">
                                    @php
                                        $st = $indices_performance[rand(0,3)];
                                    @endphp
                                    <small class="fw-bolder">{{ $st['value'] }}% -->
                                    <span class="badge bg-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span> </small>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Entreprise</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Telephone</th>
                            <th class="text-left">Indice de performance</th>
                        </tr>
                    </tfoot>
                </table>
            </div>



        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


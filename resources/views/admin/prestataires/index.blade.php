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
                    <a href="{{ route('admin.prestataires.create') }}" class="btn btn-primary">Nouveau Prestataire</a>
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
                            <th>Nom</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Telephone</th>
                            <th class="text-left">Indice de performance</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($prestataires as $key => $prestataire)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a href="{{ route('admin.prestataires.show', $prestataire) }}" class="text-black">
                                    {{ $prestataire->name }}  (<span class="fw-bolder">{{ $prestataire->slug }}</span>)
                                </a>
                            </td>
                            <td class="text-start">
                                <a href="{{ route('admin.prestataires.show', $prestataire) }}" class="text-black">{{ $prestataire->email }}</a>
                            </td>
                            <td class="text-start">{{ $prestataire->telephone }}</td>
                            <td class="text-start">
                                @php
                                    $st = $indices_performance[rand(0,3)];
                                @endphp
                                <small class="fw-bolder">{{ $st['value'] }}% -->
                                <span class="badge bg-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span> </small>
                            </td>
                        </tr>
                        @empty
                            <h3 class="text-center">Vide</h3>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
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


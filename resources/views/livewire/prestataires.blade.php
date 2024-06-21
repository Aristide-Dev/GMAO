
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
<div class="mb-4 shadow-3xl card">
    <!-- Formulaire de recherche -->
    <div lass="mb-4">
        <div class="flex mt-3 justify-content-center">
            <div class="p-3 my-2 bg-gray-100 d-flex align-items-center justify-content-between w-75 rounded-2xl">
                <label for="search" class="mx-1 font-bold">Rechercher</label>
                <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un prestataire" class="mx-2 form-control rounded-e-2xl" />
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>
    <div class="flex-wrap gap-3 card-header d-flex justify-content-between">
        <div class="mb-0 card-title me-1">
            <h5 class="mb-1">
                Liste des prestataires
            </h5>
            <p class="mb-0 text-muted">Total {{ $prestataires->total() }} prestataires</p>
        </div>

        <div class="mb-0 card-title me-1">
            <a href="{{ route('admin.prestataires.create') }}" class="btn btn-primary">Nouveau Prestataire</a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-4 row gy-4" wire:loading.class="animate-pulse">
            
            <div class="flex justify-content-center col-12" wire:loading>
                <div class="flex gap-0 p-3 bg-transparent rounded-lg justify-content-center animate-pulse">
                    <div class="demo-inline-spacing display-1">
                        <div class="spinner-border spinner-border-lg text-primary h1 display-1" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>

            @forelse ($prestataires as $key => $prestataire)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="border bg-gray-50 card text-wrap">
                        <div class="overflow-scroll d-flex align-items-end row">
                            <div class="col-8">
                                <div class="card-body text-nowrap">
                                    <h5 class="mb-0 card-title">
                                        {{ $prestataire->name }}
                                    </h5>
                                    (<span class="fw-bolder">{{ $prestataire->slug }}</span>)

                                    @php
                                        $st = $indices_performance[rand(0,3)];
                                    @endphp
                                    <div class="px-2 py-2 mx-0 mt-3 mb-3 bg-white d-flex justify-content-between w-100 col-12">
                                        <span class="text-{{ $st['color'] }}"><i class="ti ti-wand me-1 mt-n1"></i></span>
                                        <span class="badge bg-label-{{ $st['color'] }}">{{ $st['statut'] }}</span>
                                        <p class="font-bold">
                                            {{ $st['value'] }}%
                                        </p>
                                    </div>
                                    <a href="{{ route('admin.prestataires.show', $prestataire) }}" class="btn btn-primary">Voir +</a>
                                    <a href="{{ route('admin.prestataires.edit', $prestataire) }}" class="btn btn-warning">Editer</a>
                                </div>
                            </div>
                            <div class="text-center col-4 text-sm-left">
                                <div class="px-0 pb-0 card-body">
                                    <img src="/storage/assets/img/illustrations/mechanic-male-professional-worker.png" height="240"
                                        alt="view sales">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex justify-content-center col-12" wire:loading.class="hidden">
                    <div class="flex gap-0 p-3 bg-gray-700 rounded-lg justify-content-center animate-pulse">
                        <span class="px-3 py-2 m-0 font-bold text-center text-white flex-0">Aucun Prestataire trouvé</span>
                    </div>
                </div>
            @endforelse
        </div>


        <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
            <ul class="pagination">
                {{ $prestataires->links() }}
            </ul>
        </nav>
    </div>
</div>

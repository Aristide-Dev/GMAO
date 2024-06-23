<div class="p-3 card">
    <h3 class="mb-3 font-bold card-header h5">
        Liste des sites
        <p class="mb-0 font-normal text-muted">Total {{ $sites->total() }} sites</p>
    </h3>
    <div class="flex mt-2 row justify-content-end align-items-center">
        <div class="flex col-8 justify-content-end">
            <div class="w-auto p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl">
                {{-- <label for="search" class="mx-1 font-bold">Rechercher</label> --}}
                <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un site" class="mx-2 form-control rounded-2xl" />
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>



    <div class="table-responsive text-nowrap"  wire:loading.class="hidden">
        <table class="table table-hover">
            <caption class="ms-4">Liste des sites</caption>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Site</th>
                    <th>Registre</th>
                    <th>Forfait Contrat</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">


            <div class="flex justify-content-center col-12" wire:loading>
                <div class="flex gap-0 p-3 bg-transparent rounded-lg justify-content-center animate-pulse">
                    <div class="demo-inline-spacing display-1">
                        <div class="spinner-border spinner-border-lg text-primary h1 display-1" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
                @forelse($sites as $key => $site)
                <tr>
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                        <a href="{{ route('admin.sites.show', $site) }}">{{ $site->name }}</a>
                    </td>
                    <td>
                        {{ $site->registre }}
                    </td>
                    <td>
                        <span class="fw-bold">
                            {{ number_format($site->calculateTotalForfaitContrat(), 2, '.', ' ') }} GNF
                        </span>
                    </td>
                    <td>
                        @switch($site->actif)
                            @case(1)
                                <span class="badge bg-label-success me-1">actif</span>
                                @break
                            @case(0)
                                <span class="badge bg-label-danger me-1">désactivé</span>
                                @break
                            @default
                            <span class="badge bg-label-secondary me-1">N/A</span>
                            @break

                        @endswitch
                    </td>
                    <td>
                        <a href="{{ route('admin.sites.show', $site) }}" class="btn btn-primary">Voir +</a>
                        <a href="{{ route('admin.sites.edit', $site) }}" class="btn btn-warning">Editer</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">

                    <div class="flex justify-content-center col-12" wire:loading.class="hidden">
                        <div class="flex gap-0 p-3 bg-gray-200 rounded-lg justify-content-center animate-pulse w-100">
                            <span class="px-3 py-2 m-0 font-bold text-center text-black flex-0">Aucun site trouvé</span>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Site</th>
                    <th>Registre</th>
                    <th>Forfait Contrat</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>

        </table>
    </div>
    <nav aria-label="Page navigation" class="mx-3 d-flex">
        {{ $sites->links() }}
    </nav>
</div>

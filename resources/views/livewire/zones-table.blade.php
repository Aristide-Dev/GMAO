<div class="card">
    <h3 class="mb-3 font-bold card-header h5">
        Liste des Zones et Priorités
        <p class="mb-0 font-normal text-muted">Total {{ $zones->total() }} zones</p>
    </h3>
    <div class="flex px-3 mt-2 row justify-content-between align-items-center">
        <div class="col-4">
            <x-gmao.create-zone/>
        </div>
        <div class="flex col-8 justify-content-end">
            <div class="w-auto p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl">
                {{-- <label for="search" class="mx-1 font-bold">Rechercher</label> --}}
                <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un utilisateur" class="mx-2 form-control rounded-2xl" />
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>

    
    <div class="table-responsive text-nowrap" wire:loading.class="hidden">
        <table class="table table-hover">
            <caption class="ms-4">Liste des zones</caption>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>zone</th>
                    <th>priorite</th>
                    <th>Delais</th>
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
                @forelse($zones as $key => $zone)
                <tr>
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                        <a href="{{ route('admin.zones.show', $zone) }}">{{ $zone->name }}</a>
                    </td>
                    <td>
                        <div class="fw-bold p-1 rounded-pill text-center bg-label-{{ $zone->prioriteColor() }}">{{ $zone->prioriteText() }}</div>
                    </td>
                    <td>
                        <span class="text-center fw-bolder">
                            {{ $zone->delais }} H
                        </span>
                    </td>
                    <td>
                        <div class="flex gap-2">
                            <livewire:edit-zone :zone="$zone" />
                            <form method="POST"
                                action="{{route('admin.zones.destroy', $zone)}}"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ? cette action est irréversible!');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white bg-red-500 btn hover:bg-red-600 focus:bg-red-600">
                                    <i class="tf-icons ti ti-trash ti-sm me-1 animate-pulse"></i>
                                    Supprimer
                                </button>
                            </form>
                </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">

                    <div class="flex justify-content-center col-12" wire:loading.class="hidden">
                        <div class="flex gap-0 p-3 bg-gray-200 rounded-lg justify-content-center animate-pulse w-100">
                            <span class="px-3 py-2 m-0 font-bold text-center text-black flex-0">Aucune zone trouvée</span>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>zone</th>
                    <th>priorite</th>
                    <th>Delais</th>
                    <th>Actions</th>
                </tr>
            </tfoot>

        </table>
    </div>
    <nav aria-label="Page navigation" class="mx-3 d-flex">
        {{ $zones->links() }}
    </nav>

</div>
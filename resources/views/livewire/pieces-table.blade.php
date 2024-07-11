<div class="card">
    <h3 class="mb-3 font-bold card-header h5">
        Liste des pieces
        <p class="mb-0 font-normal text-muted">Total {{ $pieces->total() }} pieces</p>
    </h3>
    <div class="flex mx-1 mt-2 row justify-content-end align-items-center">
        <div class="flex col-8 justify-content-end">
            <div class="w-auto p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl">
                {{-- <label for="search" class="mx-1 font-bold">Rechercher</label> --}}
                <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un piece" class="mx-2 form-control rounded-2xl" />
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <caption class="ms-4">Liste des pieces</caption>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>piece</th>
                    <th>Qauntité</th>
                    <th>Stock min</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @forelse($pieces as $key => $piece)
                <tr  wire:loading.class="opacity-0" class="{{ (intval($piece->stock_min) >= intval($piece->quantite)) ? 'bg-red-100 text-gray-100':'' }}">
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                        <p class=""
                            href="{{ route('admin.pieces.edit', $piece) }}">{{ $piece->piece }}</p>
                    </td>
                    <td>
                        {{ $piece->quantite }}
                    </td>
                    <td>
                        <span
                            class="badge fw-bold w-100 {{ ($piece->stock_min == $piece->quantite) ? 'bg-label-danger':'text-dark' }}">{{
                            $piece->stock_min }}</span>
                    </td>
                    <td>
                        <span class="fw-bold">
                            {{ number_format($piece->price, 0, '.', ' ') }} F
                        </span>
                    </td>
                    <td>

                        <div class="flex gap-2">
                            <livewire:edit-piece :piece="$piece" />
                            <form method="POST" action="{{route('admin.pieces.destroy', $piece)}}"
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
                    <td colspan="6">

                    <div class="flex items-center justify-center col-12" wire:loading.class="hidden">
                        <div class="flex gap-0 p-3 bg-gray-200 rounded-lg justify-content-center animate-pulse w-100">
                            <span class="px-3 py-2 m-0 font-bold text-center text-black flex-0">Aucune piece trouvé</span>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div wire:loading class="flex justify-content-center col-12 w-100">
                            <div class="flex gap-0 p-3 bg-transparent rounded-lg justify-content-center animate-pulse w-100">
                                <div class="text-center demo-inline-spacing display-1">
                                    <div class="spinner-border spinner-border-lg text-primary h1 display-1" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>piece</th>
                    <th>Qauntité</th>
                    <th>Stock min</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <nav aria-label="Page navigation" class="mx-3 d-flex">
        {{ $pieces->links() }}
    </nav>

</div>

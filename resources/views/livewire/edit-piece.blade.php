@php
    $modal_id = rand();
@endphp
<div>
    <!--  Add New Credit Card -->
    <button type="button" class="text-white bg-yellow-500 border-0 btn hover:bg-yellow-600" data-bs-toggle="modal" data-bs-target="#addNewCCModal-{{$modal_id}}">
        <i class="tf-icons ti ti-edit ti-sm me-1 animate-pulse"></i>
        Editer
    </button>
    <!--/  Add New Credit Card -->

    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="addNewCCModal-{{ $modal_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="p-3 modal-content p-md-5">
                <div class="modal-body">
                    <button type="button" class="text-white bg-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="mb-4 text-center">
                        <h3 class="mb-2 font-bold">Editer Piece - ( {{ $piece->piece }} )</h3>
                        {{-- <p class="text-muted">Add new card to complete payment</p> --}}
                    </div>
                    <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.pieces.update', $piece) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="piece" class="form-label">piece</label>
                            <input type="text" id="piece" name="piece" placeholder="Nom de la piece" value="{{ $piece->piece }}" class="rounded-lg form-control"/>
                            <x-input-error bag="store_new_piece" for="piece" class="mt-2" />
                        </div>
            
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix Unitaire</label>
                            <input type="number" id="prix" name="prix" placeholder="Prix" value="{{ $piece->price }}" class="rounded-lg form-control"/>
                            <x-input-error bag="store_new_piece" for="prix" class="mt-2" />
                        </div>
            
                        <div class="mb-3">
                            <label for="quantite" class="form-label">Quantite Initiale</label>
                            <input type="number" id="quantite" name="quantite" value="{{ $piece->quantite }}" placeholder="quantite" class="rounded-lg form-control"/>
                            <x-input-error bag="store_new_piece" for="quantite" class="mt-2" />
                        </div>
            
                        <div class="mb-3">
                            <label for="stock_min" class="form-label">stock_min</label>
                            <input type="number" id="stock_min" name="stock_min" value="{{ $piece->stock_min ?? 0 }}" placeholder="Quantite pour stock minimum" class="rounded-lg form-control"/>
                            <x-input-error bag="store_new_piece" for="stock_min" class="mt-2" />
                        </div>
                        
                        <div class="flex justify-end gap-2">
                            <button type="reset"  wire:loading.attr="disabled" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                            <button type="submit" wire:loading.attr="disabled" class="text-white bg-green-500 hover:bg-green-600 btn me-sm-3 me-1 data-submit">ENREGISTRER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <!--/ Add New Credit Card Modal --> --}}
    {{-- <a href="{{ route('admin.pieces.show', $piece) }}">vvvvvvvvvvvvvv</a> --}}

</div>


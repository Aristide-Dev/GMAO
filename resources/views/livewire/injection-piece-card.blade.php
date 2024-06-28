<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center bg-purple-600 text-uppercase fw-bold w-100 badge">
        <div class="flex justify-between">
            <span>INJECTION DE PIECE DE RECHANGE</span>
            @if ($action == 'admin')
            <div class="flex justify-center gap-1">
                <button type="button" class="p-1 text-white bg-yellow-500 rounded-full hover:bg-yellow-600"
                        wire:click="openEditModal">
                    <i class="ti ti-edit ti-xs"></i>
                </button>
                <button type="button" class="p-1 text-white bg-red-500 rounded-full hover:bg-red-600"
                        wire:click="openDeleteModal">
                    <i class="ti ti-trash ti-xs"></i>
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="p-1 border-0 list-group-item list-group-item-action d-block align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Piece & Quantité
                    </h6>
                    <small class="mb-1 w-30">{{ $injectionPiece->piece->piece ?? '' }}
                        <span class="p-2 shadow-sm rounded-pill fw-bolder bg-label-light text-dark">
                            x{{ $injectionPiece->quantite ?? '' }}
                        </span>
                    </small>
                </div>

                <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Prix dans le stock
                    </h6>
                    <small class="mb-1 w-30 fw-bold">{{ $injectionPiece->stock_price ?? '' }} F</small>
                </div>

                @if(!empty($injectionPiece->fournisseur_name))
                    <div class="p-1 text-center text-black d-flex w-100 justify-content-between bg-label-light">
                        <h6 class="mb-1 text-primary fw-bold">
                            <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                            Fournisseur
                        </h6>
                        <small class="mb-1 uppercase w-30 fw-bold">{{ $injectionPiece->fournisseur_name ?? '' }}</small>
                    </div>
                @endif

                @if(!empty($injectionPiece->fournisseur_name) && !empty($injectionPiece->stock_price))
                    <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                        <h6 class="mb-1 text-primary fw-bold">
                            <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                            Prix du fournisseur
                        </h6>
                        <small class="mb-1 w-30 fw-bold">{{ $injectionPiece->fournisseur_price ?? '' }} F</small>
                    </div>
                @endif

                <div class="px-1 pt-2 text-center bg-white rounded shadow-xl d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-gray-700 fw-bold">TOTAL</h6>
                    <p class="mb-1 text-xl fw-bold">
                        {{ number_format($injectionPiece->totalAmount(), 0, '', ' ') }} F
                    </p>
                </div>
            </div>
        </div>
    </div>

@if ($action == 'admin')
    <!-- Edit Modal -->
    @if($isEditModalOpen)
    <div class="modal fade show d-block" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="p-3 text-center modal-content">
                <div class="border-0 modal-header">
                    <button type="button" class="text-red-500 bg-red-500 btn-close" wire:click="closeModals"></button>
                </div>
                <div class="p-0 modal-body onboarding-horizontal">
                    <div class="w-full p-2 mb-0 onboarding-content">
                        <h4 class="onboarding-title text-body">Editer Injection Piece</h4>
                        <form wire:submit.prevent="updateInjectionPiece" enctype="multipart/form-data">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="m-0 h6" for="piece">Pieces</label>
                                    <select id="piece-{{ $piece_id }}" name="piece"
                                        class="select2 form-select form-select-lg" wire:model.live="piece_id"
                                        onchange="updatePrixPiece()">
                                        <option value="">--- CHOISIR ---</option>
                                        @foreach ($pieces as $piece)
                                        <option value="{{ $piece->id }}" data-prix="{{ $piece->price }}">{{ $piece->piece }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('piece_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="prix_de_la_piece_dans_le_stock" class="m-0 form-label">Prix</label>
                                    <input type="text" id="prix_de_la_piece_dans_le_stock"
                                        name="prix_de_la_piece_dans_le_stock" wire.model="stock_price"
                                        value="{{ $injectionPiece->stock_price }}" class="rounded-lg form-control"
                                        disabled />
                                    @error('stock_price') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 text-start">
                                        <label class="m-0 h6" for="pris_dans_le_stock">Recuperée du stock ?</label>
                                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2"
                                            wire:model.live="take_in_stock" />
                                        <label class="switch switch-primary">
                                            <input name="pris_dans_le_stock" id="pris_dans_le_stock" type="checkbox"
                                                class="switch-input" wire:model.live="take_in_stock" />
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                        </label>
                                        @error('pris_dans_le_stock') <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if($take_in_stock == false || $take_in_fournisseur == true)
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div class="mb-2" id="nom_du_fournisseur_block">
                                        <label for="nom_du_fournisseur" class="form-label fw-bolder">Nom du
                                            fournisseur</label>
                                        <input type="text" id="nom_du_fournisseur" name="nom_du_fournisseur"
                                            placeholder="Nom du Fournisseur" class="rounded-lg form-control"
                                            wire:model.live="fournisseur_name" />
                                        @error('fournisseur_name') <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <div class="mb-2" id="prix_du_fournissseur_block">
                                        <label for="prix_du_fournissseur" class="m-0 form-label fw-bolder">Prix du
                                            fournisseur</label>
                                        <input type="number" id="prix_du_fournissseur" name="prix_du_fournissseur"
                                            placeholder="Prix de la pièce chez le fournisseur"
                                            class="rounded-lg form-control" wire:model.live="fournisseur_price" />
                                        @error('fournisseur_price') <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="mb-4">
                                <label class="m-0 h6 text-uppercase" for="file-input">DOCUMENT</label>
                                <div id="gmao_file_loder_injection_file_contennaire">
                                    <label class="gmao_file_loder" style="background-color: #ffffff">
                                        <div class="gmao_file_loder-inner">
                                            <span class="gmao_file_loder-text">Déposez le document ici ou cliquez pour le
                                                télécharger</span>
                                            <input id="file-input" name="injection_file_file" type="file"
                                                accept=".jpeg,.jpg,.png" wire:model="injection_file" />
                                        </div>
                                        <div id="preview" class="p-2 preview"></div>
                                    </label>
                                </div>
                                @error('document') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="border-0 modal-footer">
                                <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600"
                                    wire:click="closeModals">Annuler</button>
                                <button type="submit"
                                    class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Delete Modal -->
    @if($isDeleteModalOpen)
    <x-modal wire:model="isDeleteModalOpen" maxWidth="3xl">
        <div class="px-4 pb-4 bg-white sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full shrink-0 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>

                <div class="mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start">
                    <h3 class="text-lg font-medium text-gray-900">
                        Supprimer Injection Piece
                    </h3>

                    <div class="mt-4 text-sm text-gray-600">
                        Êtes-vous sûr de vouloir supprimer cette pièce injectée?
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end gap-2 px-6 py-4 bg-gray-100 text-end">
            <x-secondary-button wire:click="closeModals">Annuler</x-secondary-button>
            <x-danger-button wire:click="deleteInjectionPiece">Supprimer</x-danger-button>
        </div>
    </x-modal>
    @endif
@endif
</div>

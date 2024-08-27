<div class="mt-3 col-12">
    <div class="mb-4 col-4">
        @php
        $modal_id = rand();
        @endphp
        <!-- Add New region Button -->
        <button wire:click="resetForm" type="button" class="text-white bg-indigo-500 border-0 btn hover:bg-indigo-600" data-bs-toggle="modal" data-bs-target="#addregionLivewireFromSite-{{$modal_id}}">
            <i class="tf-icons ti ti-edit ti-sm me-1 animate-pulse"></i>
            Ajouter region
        </button>
        
    </div>

    <div class="card">
        <h3 class="mb-3 font-bold card-header h5">
            Liste des regions
            <p class="mb-0 font-normal text-muted">Total {{ $regions->total() }} regions</p>
        </h3>
        <div class="flex px-3 mt-2 row justify-content-end align-items-center">
            <div class="flex col-8 justify-content-end">
                <div class="w-auto p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl">
                    <input wire:model.live="search" name="search" type="search" placeholder="Rechercher une region" class="mx-2 form-control rounded-2xl" />
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap" wire:loading.class="hidden">
            <table class="table table-hover">
                <caption class="ms-4">Liste des régions</caption>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Région</th>
                        <th>Zone</th>
                        @if ($canActions)
                        <th>Actions</th>
                        @endif
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
                    @forelse($regions as $key => $region)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <p>{{ $region->name }}</p>
                        </td>
                        <td>
                            @if ($canActions)
                            <div class="flex gap-2">
                                <button type="button" wire:click="edit({{ $region->id }})" data-bs-toggle="modal" data-bs-target="#addregionLivewireFromSite-{{$modal_id}}">
                                    <i class="tf-icons ti ti-pencil ti-sm me-1"></i>
                                    Modifier
                                </button>
                                <button type="button" wire:click="delete({{ $region->id }})" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ? cette action est irréversible!');">
                                    <i class="tf-icons ti ti-trash ti-sm me-1 animate-pulse text-red-500"></i>
                                    Supprimer
                                </button>
                                
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{$canActions ? '4':'3'}}">
                            <div class="flex justify-content-center col-12" wire:loading.class="hidden">
                                <div class="flex gap-0 p-3 bg-gray-200 rounded-lg justify-content-center animate-pulse w-100">
                                    <span class="px-3 py-2 m-0 font-bold text-center text-black flex-0">Aucune region trouvée</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Région</th>
                        <th>Zone</th>
                        @if ($canActions)
                        <th>Actions</th>
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
        <nav aria-label="Page navigation" class="mx-3 d-flex">
            {{ $regions->links() }}
        </nav>
    </div>

    <!-- Add/Edit region Modal -->
    <div class="modal fade" id="addregionLivewireFromSite-{{ $modal_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="text-white bg-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="mb-4 text-center">
                        <h3 class="mb-2" wire:model='action_title'></h3>
                    </div>
                    <form class="pt-0 add-new-demande" method="POST" wire:submit.prevent='save'>
                        @csrf
                        <div class="mb-3">
                            <label class="h6" for="name">Nom de la region</label>
                            <input type="text" id="name" name="name" wire:model.defer="name" class="rounded-lg form-control" placeholder="Conakry" required />
                            <x-input-error bag="create_region" for="name" class="mt-2" />
                        </div>

                        <button type="submit" wire:loading.attr="disabled" class="text-white bg-green-500 hover:bg-green-600 btn me-sm-3 me-1 data-submit" >ENREGISTRER</button>
                        <button type="button" wire:loading.attr="disabled" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add/Edit region Modal -->

    <script>
        window.addEventListener('close-modal', event => {
            const modalId = "#addregionLivewireFromSite-{{ $modal_id }}";
            $(modalId).modal('hide');      // Fermer le modal
            var modal = bootstrap.Modal.getInstance(modalId)
            modal.hide();
        });
    </script>
    
</div>

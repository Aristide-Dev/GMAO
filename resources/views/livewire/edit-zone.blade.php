@php
    $modal_id = rand();
@endphp
<div>
    <!--  Add New Credit Card -->
    <button type="button" class="p-0 m-0 bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#addNewCCModal-{{$modal_id}}">
         {{ $zone->name }}
    </button>
    <!--/  Add New Credit Card -->

    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="addNewCCModal-{{ $modal_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="p-3 modal-content p-md-5">
                <div class="modal-body">
                    <button type="button" class="text-white bg-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="mb-4 text-center">
                        <h3 class="mb-2">Editer Zone - {{ $zone->name }}</h3>
                        {{-- <p class="text-muted">Add new card to complete payment</p> --}}
                    </div>
                    <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{route('admin.zones.update', $zone)}}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="h6" for="autosize-demo-{{$modal_id}}">Nom de la Zone - {{ $zone->name }}</label>
                            <input type="text" id="autosize-demo-{{$modal_id}}" name="name" wire:model="zone.name" class="form-control" value="{{ $zone->name }}" required/>

                            {{-- <x-input id="name" type="text" class="block w-full mt-1" value="{{ $zone->name }}" /> --}}
                            {{-- <x-input-error bag="create_zone" for="name" class="mt-2" /> --}}
                        </div>

                        <div class="mb-3">
                            <label class="h6" for="edit_priorite-{{$modal_id}}">Type D'urgence</label>
                            <select id="edit_priorite-{{$modal_id}}" name="priorite" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- CHOISIR ---">
                                {{-- <option value="">--- CHOISIR ---</option> --}}

                                <option value="1" @selected(($zone->priorite == 1)?true:false)>
                                    <span class="text-red fw-bolder">Prioritaire</span>
                                </option>

                                <option value="2" @selected(($zone->priorite == 2)?true:false)>
                                    <span class="text-warning fw-bolder">Moyen</span>
                                </option>

                                <option value="3" @selected(($zone->priorite == 3)?true:false)>
                                    <span class="text-success fw-bolder">Faible</span>
                                </option>
                            </select>
                            <x-input-error bag="create_zone" for="priorite" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label class="h6" for="autosize-demo-{{$modal_id}}">Délais en Heure</label>
                            <input type="number" id="autosize-demo-{{$modal_id}}" name="delais" class="form-control" placeholder="Exemple: 2h"  value="{{ $zone->delais }}" required/>
                            <x-input-error bag="create_zone" for="delais" class="mt-2" />
                        </div>


                        <button type="submit" wire:loading.attr="disabled" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
                        <button type="reset"  wire:loading.attr="disabled" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <!--/ Add New Credit Card Modal --> --}}
    {{-- <a href="{{ route('admin.zones.show', $zone) }}">vvvvvvvvvvvvvv</a> --}}

</div>


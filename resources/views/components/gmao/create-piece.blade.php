<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#gmao_offcanvasCreatepiece" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>AJOUTER UNE PIECE</span>
</button>
@php
    $show = "";
@endphp

@if ($errors->hasBag('store_new_piece'))
    @php
        $show = "show";
    @endphp
@endif
<!-- Offcanvas to create piece -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="gmao_offcanvasCreatepiece" aria-labelledby="gmao_offcanvasCreatepieceLabel">
    <div class="offcanvas-header">
        <h5 id="gmao_offcanvasCreatepieceLabel" class="offcanvas-title">Nouveau piece</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.pieces.store') }}">
            @csrf
            <div class="mb-3">
                <label for="piece" class="form-label">piece</label>
                <input type="text" id="piece" name="piece" placeholder="Nom de la piece" value="{{ old('piece') }}" class="rounded-lg form-control"/>
                <x-input-error bag="store_new_piece" for="piece" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix Unitaire</label>
                <input type="number" id="prix" name="prix" placeholder="Prix" value="{{ old('prix') }}" class="rounded-lg form-control"/>
                <x-input-error bag="store_new_piece" for="prix" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite Initiale</label>
                <input type="number" id="quantite" name="quantite" value="{{ old('quantite') }}" placeholder="quantite" class="rounded-lg form-control"/>
                <x-input-error bag="store_new_piece" for="quantite" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="stock_min" class="form-label">stock_min</label>
                <input type="number" id="stock_min" name="stock_min" value="{{ old('stock_min',0) }}" placeholder="Quantite pour stock minimum" class="rounded-lg form-control"/>
                <x-input-error bag="store_new_piece" for="stock_min" class="mt-2" />
            </div>

            <button type="reset" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="offcanvas">Annuler</button>
            <button type="submit" class="text-white bg-green-500 hover:bg-green-600 btn me-sm-3 me-1 data-submit">ENREGISTRER</button>
        </form>
    </div>
</div>

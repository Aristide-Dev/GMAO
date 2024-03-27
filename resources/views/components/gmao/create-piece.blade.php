<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCreatepiece" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>AJOUTER UNE PIECE</span>
</button>
@php
    $show = "";
@endphp

@if ($errors->hasBag('create_piece'))
    @php
        $show = "show";
    @endphp
@endif
<!-- Offcanvas to create piece -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasCreatepiece" aria-labelledby="offcanvasCreatepieceLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreatepieceLabel" class="offcanvas-title">Nouveau piece</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.pieces.store') }}">
            @csrf
            <div class="mb-3">
                <label for="piece" class="form-label">piece</label>
                <input type="text" id="piece" name="piece" placeholder="Nom de la piece" class="form-control"/>
                <x-input-error bag="create_piece" for="piece" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix Unitaire</label>
                <input type="number" id="prix" name="prix" placeholder="Prix" class="form-control"/>
                <x-input-error bag="create_piece" for="prix" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite Initiale</label>
                <input type="number" id="quantite" name="quantite" placeholder="quantite" class="form-control"/>
                <x-input-error bag="create_piece" for="quantite" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="stock_min" class="form-label">stock_min</label>
                <input type="number" id="stock_min" name="stock_min" placeholder="Quantite pour stock minimum" class="form-control" value="0"/>
                <x-input-error bag="create_piece" for="stock_min" class="mt-2" />
            </div>
            
            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>
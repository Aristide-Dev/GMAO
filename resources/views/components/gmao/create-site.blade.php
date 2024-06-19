<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCreateSite" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVEAU SITE</span>
</button>

@php
    $show = "";
@endphp

@if ($errors->hasBag('create_site'))
    @php
        $show = "show";
    @endphp
@endif
<!-- Offcanvas to create site -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasCreateSite" aria-labelledby="offcanvasCreateSiteLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreateSiteLabel" class="offcanvas-title">Nouveau site - show: {{ $show }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.sites.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Site</label>
                <input type="text" id="name" name="name" placeholder="Nom du site" class="rounded form-control"/>
                <x-input-error bag="create_site" for="name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="registre">registre</label>
                <select id="registre" name="registre" class="select2 form-select form-select-sm" data-allow-clear="true">
                    <option value="0">-- CHOISIR --</option>
                    <option value="contrat">CONTRAT</option>
                    <option value="b2b">B2B</option>
                    <option value="autre">AUTRE</option>
                </select>
                <x-input-error bag="create_site" for="registre" class="mt-2" />
            </div>
            <button type="submit" class="text-white bg-green-500 hover:bg-green-600 btn">ENREGISTRER</button>
            <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>
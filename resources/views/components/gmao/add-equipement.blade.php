@props(['site'])
@if (!isset($site))
    @php
        throw new InvalidArgumentException('Le composant (add-equipement) nécessite une prop "site"');
    @endphp
@endif

<button class="mb-2 text-gray-300 hover:text-white shadow-3xl shadow-red-500 btn bg-sky-600 hover:bg-sky-800 text-wrap add-new-role btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddEquipementToSite" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>AJOUTER EQUIPEMENT</span>
</button>

@php
    $show = "";
@endphp

@if ($errors->hasBag('create_equipement'))
    @php
        $show = "show";
    @endphp
@endif
<!-- Offcanvas to add new equipement to site -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasAddEquipementToSite" aria-labelledby="offcanvasAddEquipementToSiteLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddEquipementToSiteLabel" class="offcanvas-title">Ajouter un equipement</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0" id="AddEquipementToSiteForm" method="POST" action="{{route('admin.sites.equipement.store', $site)}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Equipement</label>
                <input type="text" id="name" name="name" placeholder="Nom de l'équipement" class="rounded form-control" value="{{ old('name') }}"/>
                <x-input-error bag="create_equipement" for="name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="numero_serie" class="form-label">numero de serie</label>
                <input type="text" id="numero_serie" name="numero_serie" placeholder="exemple:14528 ddezf rf9" class="rounded form-control" value="{{ old('numero_serie') }}"/>
                <x-input-error bag="create_equipement" for="numero_serie" class="mt-2" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="categorie">Categorie</label>
                <select id="categorie" name="categorie" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="-- CHOISIR --">
                    <option value="">-- CHOISIR --</option>
                    <option value="distributeur" {{ old('categorie') == 'distributeur' ? 'selected' : '' }}>distributeur</option>
                    <option value="stockage-et-tuyauterie" {{ old('categorie') == 'stockage-et-tuyauterie' ? 'selected' : '' }}>stockage et tuyauterie</option>
                    <option value="forage" {{ old('categorie') == 'forage' ? 'selected' : '' }}>forage</option>
                    <option value="servicing" {{ old('categorie') == 'servicing' ? 'selected' : '' }}>servicing</option>
                    <option value="branding" {{ old('categorie') == 'branding' ? 'selected' : '' }}>branding</option>
                    <option value="groupe-electrogene" {{ old('categorie') == 'groupe-electrogene' ? 'selected' : '' }}>groupe electrogene</option>
                    <option value="electricite" {{ old('categorie') == 'electricite' ? 'selected' : '' }}>electricite</option>
                    <option value="equipement-incendie" {{ old('categorie') == 'equipement-incendie' ? 'selected' : '' }}>equipement incendie</option>
                </select>
                <x-input-error bag="create_equipement" for="categorie" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="forfait_contrat" class="form-label">Forfait Contrat</label>
                <input type="number" id="forfait_contrat" name="forfait_contrat" placeholder="Forfait mensuel" class="rounded form-control" value="{{ old('forfait_contrat') }}"/>
                <x-input-error bag="create_equipement" for="forfait_contrat" class="mt-2" />
            </div>
            <button type="reset" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="offcanvas">Annuler</button>
            <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1 data-submit">ENREGISTRER</button>
        </form>
    </div>
</div>

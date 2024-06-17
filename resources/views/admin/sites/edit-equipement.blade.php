<x-gmao-layout>
    <x-slot name="title">{{ __('Editer site') }}</x-slot>
    <x-slot name="title_desc">{{ __('Editer site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['sites'=> route('admin.sites.index'), ''.$site->name.'' => route('admin.sites.show',$site), 'Editer site' => '']"/>

    <div class="row">
        <div class="col-xxl">
            <div class="mb-4 card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Editer les informations de l'equipement <span class="font-bold">{{ $equipement->name }}</span> </h5>
                    {{-- <small class="text-muted float-end">Merged input group</small> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form class="pt-0" id="AddEquipementToSiteForm" method="POST" {{ route('admin.sites.equipement.update',['site' => $equipement->site, 'equipement'=> $equipement]) }}">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Equipement</label>
                                    <input type="text" id="name" name="name" placeholder="Nom de l'équipement" class="rounded form-control" value="{{ old('name',$equipement->name) }}"/>
                                    <x-input-error bag="edit_equipement" for="name" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="numero_serie" class="form-label">numero de serie</label>
                                    <input type="text" id="numero_serie" name="numero_serie" placeholder="exemple:14528 ddezf rf9" class="rounded form-control" value="{{ old('numero_serie',$equipement->numero_serie) }}"/>
                                    <x-input-error bag="edit_equipement" for="numero_serie" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="categorie">Categorie</label>
                                    <select id="categorie" name="categorie" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="-- CHOISIR --">
                                        <option value="">-- CHOISIR --</option>
                                        <option value="distributeur" {{ old('categorie',$equipement->categorie) == 'distributeur' ? 'selected' : '' }}>distributeur</option>
                                        <option value="stockage-et-tuyauterie" {{ old('categorie',$equipement->categorie) == 'stockage-et-tuyauterie' ? 'selected' : '' }}>stockage et tuyauterie</option>
                                        <option value="forage" {{ old('categorie',$equipement->categorie) == 'forage' ? 'selected' : '' }}>forage</option>
                                        <option value="servicing" {{ old('categorie',$equipement->categorie) == 'servicing' ? 'selected' : '' }}>servicing</option>
                                        <option value="branding" {{ old('categorie',$equipement->categorie) == 'branding' ? 'selected' : '' }}>branding</option>
                                        <option value="groupe-electrogene" {{ old('categorie',$equipement->categorie) == 'groupe-electrogene' ? 'selected' : '' }}>groupe electrogene</option>
                                        <option value="electricite" {{ old('categorie',$equipement->categorie) == 'electricite' ? 'selected' : '' }}>electricite</option>
                                        <option value="equipement-incendie" {{ old('categorie',$equipement->categorie) == 'equipement-incendie' ? 'selected' : '' }}>equipement incendie</option>
                                    </select>
                                    <x-input-error bag="edit_equipement" for="categorie" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="forfait_contrat" class="form-label">Forfait Contrat</label>
                                    <input type="number" id="forfait_contrat" name="forfait_contrat" placeholder="Forfait mensuel" class="rounded form-control" value="{{ old('forfait_contrat',$equipement->forfait_contrat) }}"/>
                                    <x-input-error bag="edit_equipement" for="forfait_contrat" class="mt-2" />
                                </div>
                                <button type="reset" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="offcanvas">Annuler</button>
                                <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1 data-submit">ENREGISTRER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gmao-layout>


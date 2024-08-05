@php
    // Liste des produits
    $products = ['Essence', 'Super sans plomb', 'Gasoil', 'JET A1', 'HFO'];

    // Génération des combinaisons possibles
    $product_combinations = [];
    foreach ($products as $product1) {
        foreach ($products as $product2) {
            if ($product1 !== $product2) {
                $combination = $product1 . '/' . $product2;
                $reverse_combination = $product2 . '/' . $product1;
                // Éviter les doublons comme Essence/Gasoil et Gasoil/Essence
                if (!in_array($combination, $product_combinations) && !in_array($reverse_combination, $product_combinations)) {
                    $product_combinations[] = $combination;
                }
            }
        }
    }
@endphp
<x-gmao-layout>
    <x-slot name="title">{{ __('Editer site') }}</x-slot>
    <x-slot name="title_desc">{{ __('Editer site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['sites'=> route('admin.sites.index'), ''.$site->name.'' => route('admin.sites.show',$site), 'Editer site' => '']" />

    <div class="row">
        <div class="col-xxl">
            <div class="mb-4 card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Editer les informations de l'equipement <span class="font-bold">{{ $equipement->name }}</span> </h5>
                    {{-- <small class="text-muted float-end">Merged input group</small> --}}
                </div>
                <div class="card-body">
                    <form class="pt-0" id="AddEquipementToSiteForm" method="POST" {{ route('admin.sites.equipement.update',['site' => $equipement->site, 'equipement'=> $equipement]) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Equipement</label>
                                    <input type="text" id="name" name="name" placeholder="Nom de l'équipement" class="rounded form-control form-control-sm" value="{{ old('name',$equipement->name) }}" />
                                    <x-input-error bag="edit_equipement" for="name" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="numero_serie" class="form-label">Numero de serie</label>
                                    <input type="text" id="numero_serie" name="numero_serie" placeholder="exemple:14528 ddezf rf9" class="rounded form-control form-control-sm" value="{{ old('numero_serie',$equipement->numero_serie) }}" />
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
                                        <option value="compteur-et-pompes-de-transfert" {{ old('categorie',$equipement->categorie) == 'compteur-et-pompes-de-transfert' ? 'selected' : '' }}>Compteur et Pompes de transfert</option>
                                        <option value="autres-equipements-et-immobiliers" {{ old('categorie',$equipement->categorie) == 'autres-equipements-et-immobiliers' ? 'selected' : '' }}>Autres équipements et immobiliers</option>
                                    </select>
                                    <x-input-error bag="edit_equipement" for="categorie" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="forfait_contrat" class="form-label">Forfait Contrat</label>
                                    <input type="number" id="forfait_contrat" name="forfait_contrat" placeholder="Forfait mensuel" class="rounded form-control form-control-sm" value="{{ old('forfait_contrat',$equipement->forfait_contrat) }}" />
                                    <x-input-error bag="edit_equipement" for="forfait_contrat" class="mt-2" />
                                </div>
                            </div>

                            <div class="bg-gray-100 border shadow-lg col-md-4 rounded-xl">
                                <h1 class="mt-2 mb-3 font-bold">Autres Propriétés</h1>
                                <div class="mb-3">
                                    <label for="marque" class="form-label">marque</label>
                                    <input type="text" id="marque" name="marque" placeholder="Marque de l'équipement" class="rounded form-control form-control-sm" value="{{ old('marque',$equipement->marque) }}" />
                                    <x-input-error bag="edit_equipement" for="marque" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <input type="text" id="type" name="type" placeholder="exemple: 2-2" class="rounded form-control form-control-sm" value="{{ old('type',$equipement->type) }}" />
                                    <x-input-error bag="edit_equipement" for="type" class="mt-2" />
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="produit">Produit</label>
                                    <select id="produit" name="produit" class="select2 form-select form-select-sm" data-allow-clear="true" data-placeholder="-- CHOISIR --">
                                        <option value="">-- CHOISIR --</option>
                                        {{-- @foreach($products as $product)
                                            <option value="{{ $product }}" {{ old('produit', $equipement->produit) == $product ? 'selected' : '' }}>{{ $product }}</option>
                                        @endforeach --}}
                                        @foreach($product_combinations as $combination)
                                            <option class="font-bold" value="{{ $combination }}" {{ old('produit', $equipement->produit) == $combination ? 'selected' : '' }}>{{ $combination }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error bag="edit_equipement" for="produit" class="mt-2" />
                                </div>

                                
                                <div class="mb-3">
                                    <label for="annee_fabrication" class="form-label">Année de Fabrication</label>
                                    <input type="number" id="annee_fabrication" name="annee_fabrication" placeholder="Année de Fabrication" class="rounded form-control form-control-sm" value="{{ old('annee_fabrication', $equipement->annee_fabrication) }}" />
                                    <x-input-error bag="edit_equipement" for="annee_fabrication" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="puissance" class="form-label">Puissance</label>
                                    <input type="number" id="puissance" name="puissance" placeholder="Puissance" class="rounded form-control form-control-sm" value="{{ old('puissance', $equipement->puissance) }}" />
                                    <x-input-error bag="edit_equipement" for="puissance" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="capacite" class="form-label">Capacité</label>
                                    <input type="number" id="capacite" name="capacite" placeholder="Capacité" class="rounded form-control form-control-sm" value="{{ old('capacite', $equipement->capacite) }}" />
                                    <x-input-error bag="edit_equipement" for="capacite" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="observations" class="form-label">Observations</label>
                                    <textarea id="observations" name="observations" placeholder="Observations" class="rounded form-control form-control-sm">{{ old('observations', $equipement->observations) }}</textarea>
                                    <x-input-error bag="edit_equipement" for="observations" class="mt-2" />
                                </div>
                                
                            </div>
                        </div>

                        <button type="reset" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="offcanvas">Annuler</button>
                        <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1 data-submit">ENREGISTRER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-gmao-layout>


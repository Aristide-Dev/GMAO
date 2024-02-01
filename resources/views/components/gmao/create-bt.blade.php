@php
    $rapport_id ="create-bt-offcanvas";
@endphp



<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $rapport_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVEAU BON DE TRAVAIL</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $rapport_id }}" aria-labelledby="{{ $rapport_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $rapport_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">BON DE TRAVAIL</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">

            <div class="mb-3">
                <label class="h6" for="autosize-demo">Requête</label>
                <textarea id="autosize-demo" name="requete" rows="3" class="form-control" placeholder="decrivez la panne"></textarea>
            </div>
            
            <div class="mb-3">
                <label class="h6" for="zone">Zone - Priorité - Délais</label>
                <select id="zone" name="zone" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- CHOISIR ---">
                    <option value="">--- CHOISIR ---</option>
                    
                    <option value="1">
                        Conakry - <span class="text-warning fw-bolder">Prioritaire</span> - <span class="fw-bolder">1h</span>
                    </option>
                    
                    <option value="2">
                        Conakry - <span class="text-warning fw-bolder">Moyen</span> - <span class="fw-bolder">3h</span>
                    </option>
                    
                    <option value="2">
                        Conakry - <span class="text-warning fw-bolder">Faible</span> - <span class="fw-bolder">6h</span>
                    </option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="h6" for="equipement">Equipement</label>
                <select id="equipement" name="equipement" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- SELECTIONNER UN EQUIPEMENT ---">
                    <option value="">--CHOIX--</option>
                    <option value="cuve">cuve</option>
                    <option value="distributeur">distributeur</option>
                    <option value="pompe">pompe</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="h6" for="prestataire">Prestataire</label>
                <select id="prestataire" name="prestataire" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- SELECTIONNER UN PRESTATAIRE ---">
                    <option value="">--CHOIX--</option>
                    <option value="{{ fake()->name }}">{{ fake()->name }}</option>
                    <option value="{{ fake()->name }}">{{ fake()->name }}</option>
                    <option value="{{ fake()->name }}">{{ fake()->name }}</option>
                    <option value="{{ fake()->name }}">{{ fake()->name }}</option>
                    <option value="{{ fake()->name }}">{{ fake()->name }}</option>
                </select>
            </div>
            

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

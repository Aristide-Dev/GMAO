<button class="mb-2 btn btn-primary text-wrap add-new-role btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddEquipementToSite" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>AJOUTER EQUIPEMENT</span>
</button>
<!-- Offcanvas to add new equipement to site -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddEquipementToSite" aria-labelledby="offcanvasAddEquipementToSiteLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddEquipementToSiteLabel" class="offcanvas-title">Ajouter un equipement</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0" id="AddEquipementToSiteForm" onsubmit="return false">
            <div class="mb-3">
                <label for="name" class="form-label">Equipement</label>
                <input type="text" id="name" placeholder="Nom de l'équipement" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="categorie">Categorie</label>
                <select id="categorie" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="-- CHOISIR --">
                    <option value="">-- CHOISIR --</option>
                    <option value="distributeur">distributeur</option>
                    <option value="stockage-et-tuyauterie">stockage-et-tuyauterie</option>
                    <option value="forage">forage</option>
                    <option value="servicing">servicing</option>
                    <option value="branding">branding</option>
                    <option value="groupe-electrogene">groupe-electrogene</option>
                    <option value="electricite">electricite</option>
                    <option value="equipement-incendie">equipement-incendie</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forfait_contrat" class="form-label">Forfait Contrat</label>
                <input type="number" id="forfait_contrat" placeholder="Forfait mensuel" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCreateSite" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVEAU SITE</span>
</button>
<!-- Offcanvas to create site -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCreateSite" aria-labelledby="offcanvasCreateSiteLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreateSiteLabel" class="offcanvas-title">Nouveau site</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">
            <div class="mb-3">
                <label for="name" class="form-label">Site</label>
                <input type="text" id="name" placeholder="Nom du site" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="registre">registre</label>
                <select id="registre" name="registre" class="form-select">
                    <option value="">-- CHOISIR --</option>
                    <option value="contrat">CONTRAT</option>
                    <option value="b2b">B2B</option>
                    <option value="autre">AUTRE</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

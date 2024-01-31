<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span class="d-none d-sm-inline-block">Nouvelle Demande</span>
    <span class="d-md-none">Créer</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvelle demande d'intervention</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm dropzone-basic" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="site">site</label>
                <select id="site" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="matam">matam</option>
                    <option value="dixiin">dixiin</option>
                    <option value="mamou">mamou</option>
                    <option value="coyah">coyah</option>
                </select>
            </div>

            <div action="null" class="mb-3 dropzone needsclick" id="dropzone-basic">
                <div class="dz-message needsclick">
                    Déplacez le fichier ici ou cliquez pour télécharger.
                </div>
                <div class="fallback">
                    <input name="file" type="file" />
                </div>
            </div>

            <div class="w-100 justify-content-between d-inline-flex">
                <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
                <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            </div>

        </form>





    </div>
</div>


<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span class="d-none d-sm-inline-block">Nouvelle Demande</span>
    <span class="d-md-none">Ajouter</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvelle demande d'intervention</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="site">site</label>
                <select id="site" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="matam">matam</option>
                    <option value="dixiin">dixiin</option>
                    <option value="mamou">mamou</option>
                    <option value="coyah">coyah</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="equipement">Equipement</label>
                <select id="equipement" name="equipement" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="cuve">cuve</option>
                    <option value="distributeur">distributeur</option>
                    <option value="pompe">pompe</option>
                </select>
            </div>
            <div class="mb-3 row">
                <div class="mb-4 col-md-6 col-12">
                    <label for="bs-datepicker-format" class="form-label">Date de déclaration</label>
                    <input type="date" id="bs-datepicker-format" format="dd/mm/yyyy" placeholder="JJ/MM/AAAA" class="form-control" />
                </div>
                <div class="mb-4 col-md-6 col-12">
                    <label for="bs-datepicker-format" class="form-label">Heure de déclaration</label>
                    <input type="time" id="bs-datepicker-format" placeholder="JJ/MM/AAAA" class="form-control" />
                </div>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="decrivez la panne"></textarea>
            </div>

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

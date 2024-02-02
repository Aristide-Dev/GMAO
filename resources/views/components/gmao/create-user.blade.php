<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvelle utilisateur</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Prenom</label>
                <input type="text" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Nom</label>
                <input type="text" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Email</label>
                <input type="email" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Telephone</label>
                <input type="text" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Compétence</label>
                <input type="text" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="role">role</label>
                <select id="role" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="-- CHOISIR --">
                    <option value="">-- CHOISIR --</option>
                    <option value="demandeur">Demandeur</option>
                    <option value="agent-maintenance">agent maintenance</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Mot de passe</label>
                <input type="password" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Confirmé le mot de passe</label>
                <input type="password" id="bs-datepicker-format" placeholder="" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

@php
    $rapport_id ="rapport-remplacement-offcanvas";
@endphp



<button class="add-new btn btn-warning waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $rapport_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>RAPPORT DE REMPLACEMENT</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end bg-warning" tabindex="-1" id="{{ $rapport_id }}" aria-labelledby="{{ $rapport_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $rapport_id }}Label" class="p-1 mx-2 text-black rounded text-uppercase bg-label-warning">Rapport de Remplacement</h6>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">
            <div class="mb-3">
                <label class="text-white h6" for="site">site</label>
                <select id="site" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="matam">matam</option>
                    <option value="dixiin">dixiin</option>
                    <option value="mamou">mamou</option>
                    <option value="coyah">coyah</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="text-white h6" for="equipement">Equipement</label>
                <select id="equipement" name="equipement" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="cuve">cuve</option>
                    <option value="distributeur">distributeur</option>
                    <option value="pompe">pompe</option>
                </select>
            </div>
            <div class="mb-3 row">
                <div class="mb-4 col-md-6 col-12">
                    <label for="bs-datepicker-format" class="text-white h6">Date de déclaration</label>
                    <input type="date" id="bs-datepicker-format" format="dd/mm/yyyy" placeholder="JJ/MM/AAAA" class="form-control" />
                </div>
                <div class="mb-4 col-md-6 col-12">
                    <label for="bs-datepicker-format" class="text-white h6">Heure de déclaration</label>
                    <input type="time" id="bs-datepicker-format" placeholder="JJ/MM/AAAA" class="form-control" />
                </div>

            </div>
            <div class="mb-3">
                <label for="description" class="text-white h6">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="decrivez la panne"></textarea>
            </div>

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

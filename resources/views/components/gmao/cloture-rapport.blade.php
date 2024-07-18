@props(['rapport_intervention' => '', 'btn' => true])
@php
    $rapport_id ="cloture-rapport-offcanvas";
    $show = '';
@endphp



@if ($errors->hasBag('create_cloture_rapport'))
    @php
        $show = 'show';
    @endphp
@endif


@if ($btn == true)
<button class="add-new btn btn-success waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $rapport_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>CLOTURER LA REQUETE</span>
</button>
@endif
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end text-start {{ $show }}" tabindex="-1" id="{{ $rapport_id }}" aria-labelledby="{{ $rapport_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $rapport_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">CLOTURER LA REQUETE</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.demandes.cloture', $rapport_intervention) }}">
            @csrf
            <div class="mb-3">
                <label class="m-0 text-white h6 text-uppercase" for="r_cloture_status">statut</label>
                <select id="r_cloture_status" name="status" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="Clôturé">Clôturé / (reparé)</option>
                    <option value="annulé">annulé</option>
                </select>
                <x-input-error bag="create_cloture_rapport" for="status" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">numero_devis</label>
                <input type="text" name="numero_devis" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" />
                <x-input-error bag="create_cloture_rapport" for="numero_devis" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">bon_commande</label>
                <input type="text" name="bon_commande" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" />
                <x-input-error bag="create_cloture_rapport" for="bon_commande" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="autosize-demo">Commentaire</label>
                <textarea id="autosize-demo" name="commentaire" rows="3" class="rounded-lg form-control" placeholder=""></textarea>
                <x-input-error bag="create_cloture_rapport" for="commentaire" class="mt-2" />
            </div>


            <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600" data-bs-dismiss="offcanvas">Annuler</button>
            <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1 data-submit">ENREGISTRER</button>
        </form>
    </div>
</div>

@props(['zones', 'demande', 'prestataires', 'btn'=> true, 'btn_color'=> 'primary'])
@php
    $show = '';
    $create_bt_id ="create-bt-offcanvas";
@endphp



@if ($errors->hasBag('create_bon_travail'))
    @php
        $show = 'show';
    @endphp
@endif

@if ($btn == true)
<button class="add-new btn btn-{{ $btn_color }} waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $create_bt_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVEAU BON DE TRAVAIL</span>
</button>
@endif

<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="{{ $create_bt_id }}" aria-labelledby="{{ $create_bt_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $create_bt_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">BON DE TRAVAIL</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-bontravail" id="addNewbontravailForm" method="POST" action="{{ route('admin.bon-travail.store') }}">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="di_reference" value="{{ $demande->di_reference }}"/>
                <x-input-error bag="create_bon_travail" for="di_reference" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="autosize-demo">Requête</label>
                <textarea id="autosize-demo" name="requete" rows="3" class="rounded-lg form-control" placeholder="decrivez la panne"></textarea>
                <x-input-error bag="create_bon_travail" for="requete" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="create_bt_zone">Zone - Priorité - Délais</label>
                <select id="create_bt_zone" name="zone" class="rounded-lg select2 form-select form-select-lg" data-allow-clear="true"
                    data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }} - <span class="fw-bolder">{{ $zone->prioriteText() }}</span> - {{ $zone->delais }}H</option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="zone" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="create_bt_equipement">equipement - Priorité - Délais</label>
                <select id="create_bt_equipement" name="equipement" class="rounded-lg select2 form-select form-select-lg" data-allow-clear="true"
                    data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($demande->site->equipements as $equipement)
                        <option value="{{ $equipement->id }}">{{ $equipement->name }} - {{ $equipement->numero_serie }} </option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="equipement" class="mt-2" />
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="create_bt_affectee_travaux" name="create_bt_affectee_travaux" onclick="togglePrestataire()"/>
                <label class="pt-3 mt-3 h6" for="create_bt_affectee_travaux">Affectées Travaux ?</label>
                <x-input-error bag="create_bon_travail" for="create_bt_affectee_travaux" class="mt-2" />
            </div>
            
            <div class="mb-3" id="prestataire_div">
                <label class="h6" for="create_bt_prestataire">Prestataire</label>
                <select id="create_bt_prestataire" name="prestataire" class="rounded-lg select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($prestataires as $prestataire)
                        <option value="{{ $prestataire->id }}">{{ $prestataire->slug }} - {{ $prestataire->name }} </option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="prestataire" class="mt-2" />
            </div>


            <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600" data-bs-dismiss="offcanvas">Annuler</button>
            <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 me-sm-3 me-1 data-submit">ENREGISTRER</button>
        </form>
    </div>
</div>
<script>
    // function togglePrestataire() {
    //     var isChecked = document.getElementById('create_bt_affectee_travaux').checked;
    //     var prestataireDiv = document.getElementById('prestataire_div');
    //     if (isChecked) {
    //         prestataireDiv.style.display = 'none';
    //         document.getElementById('create_bt_prestataire').value = '';
    //     } else {
    //         prestataireDiv.style.display = 'block';
    //     }
    // }
</script>
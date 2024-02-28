@props(['zones', 'equipements', 'prestataires'])
@php
    $show = '';
    $create_bt_id ="create-bt-offcanvas";
@endphp



@if ($errors->hasBag('create_bon_travail'))
    @php
        $show = 'show';
    @endphp
@endif

<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $create_bt_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVEAU BON DE TRAVAIL</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="{{ $create_bt_id }}" aria-labelledby="{{ $create_bt_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $create_bt_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">BON DE TRAVAIL</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-bontravail" id="addNewbontravailForm" method="POST" action="{{route('admin.bon-travail.store')}}">
            @csrf
            <div class="mb-3">
                <label class="h6" for="autosize-demo">Requête</label>
                <textarea id="autosize-demo" name="requete" rows="3" class="form-control" placeholder="decrivez la panne"></textarea>
                <x-input-error bag="create_bon_travail" for="requete" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="zone">Zone - Priorité - Délais</label>
                <select id="zone" name="zone" class="select2 form-select form-select-lg" data-allow-clear="true"
                    data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }} - <span class="fw-bolder">{{ $zone->prioriteText() }}</span> - {{ $zone->delais }}H</option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="zone" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="equipement">equipement - Priorité - Délais</label>
                <select id="equipement" name="equipement" class="select2 form-select form-select-lg" data-allow-clear="true"
                    data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($equipements as $equipement)
                        <option value="{{ $equipement->id }}">{{ $equipement->name }} - {{ $equipement->numero_serie }} </option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="equipement" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="prestataire">prestataire</label>
                <select id="prestataire" name="prestataire" class="select2 form-select form-select-lg" data-allow-clear="true"
                    data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($prestataires as $prestataire)
                        <option value="{{ $prestataire->id }}">{{ $prestataire->slug }} - {{ $prestataire->name }} </option>
                    @endforeach
                </select>
                <x-input-error bag="create_bon_travail" for="prestataire" class="mt-2" />
            </div>
            

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

@php
    $zone_offcanvas_id ="create-zone-offcanvas";
    $show = "";
@endphp

@if ($errors->hasBag('create_zone'))
    @php
        $show = 'show';
    @endphp
@endif



<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $zone_offcanvas_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>NOUVELLE ZONE</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="{{ $zone_offcanvas_id }}" aria-labelledby="{{ $zone_offcanvas_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $zone_offcanvas_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">ZONES & URGENCES</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{route('admin.zones.store')}}">
            @csrf
            <div class="mb-3">
                <label class="h6" for="autosize-demo">Nom de la Zone</label>
                <input type="text" id="autosize-demo" name="name" class="form-control" placeholder="Conakry" />
                <x-input-error bag="create_zone" for="name" class="mt-2" />
            </div>
            
            <div class="mb-3">
                <label class="h6" for="priorite">Type D'urgence</label>
                <select id="priorite" name="priorite" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- CHOISIR ---">
                    <option value="">--- CHOISIR ---</option>
                    
                    <option value="3">
                        <span class="text-red fw-bolder">Prioritaire</span>
                    </option>
                    
                    <option value="2">
                        <span class="text-warning fw-bolder">Moyen</span>
                    </option>
                    
                    <option value="1">
                        <span class="text-success fw-bolder">Faible</span>
                    </option>
                </select>
                <x-input-error bag="create_zone" for="priorite" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="h6" for="autosize-demo">Délais</label>
                <input type="number" id="autosize-demo" name="delais" class="form-control" placeholder="Exemple: 2h" />
                <x-input-error bag="create_zone" for="delais" class="mt-2" />
            </div>
            

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

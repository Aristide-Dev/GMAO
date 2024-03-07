@props(['prestataire'])
<!-- Offcanvas to add new demande -->
<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddAgentToPresta" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span class="d-none d-sm-inline-block">Ajouter un Agent</span>
    <span class="d-md-none">Ajouter</span>
</button>
@php
$show = "";
@endphp

@if ($errors->hasBag('create_presta_agent'))
@php
    $show = "show";
@endphp
@endif
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasAddAgentToPresta" aria-labelledby="offcanvasAddAgentToPrestaLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddAgentToPrestaLabel" class="offcanvas-title">Nouvelle Agent</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewPrestaagent" method="POST" action="{{ route('admin.prestataires.create_agent', $prestataire) }}">
            @csrf
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Prenom</label>
                <input type="text" name="first_name" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="first_name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Nom</label>
                <input type="text" name="last_name" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="last_name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Email</label>
                <input type="email" name="email" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="email" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Telephone</label>
                <input type="text" name="telephone" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="telephone" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Mot de passe</label>
                <input type="password" name="password" for="password" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="password" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Confirmé le mot de passe</label>
                <input type="password" name="password_confirmation" id="bs-datepicker-format" placeholder="" class="form-control" />
                <x-input-error bag="create_presta_agent" for="password_confirmation" class="mt-2" />
            </div>
            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>


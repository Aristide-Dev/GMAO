@props(['action' => 'public'])
<!-- Offcanvas to add new demande -->

<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span class="d-none d-sm-inline-block">Nouvel Utilisateur</span>
    <span class="d-md-none">Ajouter</span>
</button>
@php
$show = "";
@endphp

@if ($errors->hasBag('create_utilisateur'))
@php
    $show = "show";
@endphp
@endif
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvel utilisateur</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="flex-grow-0 pt-0 mx-0 bg-gray-100 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('prestataires.utilisateurs.store') }}">
            @csrf
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Prenom</label>
                <input type="text" name="first_name" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('first_name') }}" />
                <x-input-error bag="create_utilisateur" for="first_name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Nom</label>
                <input type="text" name="last_name" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('last_name') }}" />
                <x-input-error bag="create_utilisateur" for="last_name" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Email</label>
                <input type="email" name="email" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('email') }}" />
                <x-input-error bag="create_utilisateur" for="email" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Telephone</label>
                <input type="text" name="telephone" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('telephone') }}" />
                <x-input-error bag="create_utilisateur" for="telephone" class="mt-2" />
            </div>
            <input type="hidden" name="role" value="agent">
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Mot de passe</label>
                <input type="password" name="password" for="password" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('first_name') }}" />
                <x-input-error bag="create_utilisateur" for="password" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="bs-datepicker-format" class="form-label">Confirmé le mot de passe</label>
                <input type="password" name="password_confirmation" id="bs-datepicker-format" placeholder="" class="rounded-lg form-control" value="{{ old('first_name') }}" />
                <x-input-error bag="create_utilisateur" for="password_confirmation" class="mt-2" />
            </div>
            <button type="reset" class="text-white bg-red-500 hover:bg-red-600 btn" data-bs-dismiss="offcanvas">Annuler</button>
            <button type="submit" class="text-white bg-green-500 hover:bg-green-600 btn me-sm-3 me-1 data-submit">ENREGISTRER</button>
        </form>
    </div>
</div>


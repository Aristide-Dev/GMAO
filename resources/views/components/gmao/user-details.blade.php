@props(['utilisateur'])

@php
$details_active_class = "show active";
$details_active_btn = "active";

$password_active_class = "";
$password_active_btn = "active";

if($errors->edit_utilisateur->isNotEmpty())
{
$details_active_class = "show active";
$details_active_btn = "active";

$password_active_class = "";
$password_active_btn = "";
}

if($errors->rest_password_for_utilisateur->isNotEmpty())
{
$details_active_class = "";
$details_active_btn = "";

$password_active_class = "show active";
$password_active_btn = "active";
}
@endphp

<div class="row">
    <!-- User Sidebar -->
    <div class="order-0 col-xl-4 col-lg-5 col-md-5">
        <!-- User Card -->
        <div class="mb-4 card">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="100">
                            <path fill="#B197FC"
                                d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                        <div class="text-center user-info">
                            <h4 class="mb-2">{{ $utilisateur->first_name }} {{ $utilisateur->last_name }}</h4>
                            <span class="mt-1 badge bg-label-secondary">{{ $utilisateur->role_text }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->

        @php
        $indice_color="";
        $indice_label="";
        $indice = rand(0,100);

        if($indice < 30 ) { $indice_color="danger" ; $indice_label="Mauvais" ; }elseif($indice>= 30 && $indice < 60) {
                $indice_color="warning" ; $indice_label="Moyen" ; }elseif($indice>= 60 && $indice < 90) {
                    $indice_color="primary" ; $indice_label="Bon" ; }elseif($indice>= 90 && $indice <= 100) {
                        $indice_color="success" ; $indice_label="Excellent" ; } @endphp <!-- Plan Card -->
                        @if ($utilisateur->role == 'prestataire_admin' || $utilisateur->role == 'agent')
                        <div class="mb-4 card">
                            <div class="bg-blue-800 border-bottom card-header d-flex justify-content-between rounded-3">
                                <h1 class="m-0 font-bold text-white uppercase card-title me-2">{{
                                    $utilisateur->prestataire->name }}</h1>
                                <h5 class="m-0 text-gray-300 uppercase card-title ms-2">{{
                                    $utilisateur->prestataire->slug }}</h5>
                            </div>
                            <div class="p-3 card-body rounded-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="badge bg-label-{{ $indice_color }}">{{ $indice_label }}</span>
                                    <div class="d-flex justify-content-center">
                                        <h1 class="mb-0 text-{{ $indice_color }}">{{ $indice }}</h1>
                                        <sub class="mt-auto mb-2 h6 pricing-duration text-muted fw-normal">%</sub>
                                    </div>
                                </div>
                                <div class="flex-wrap pb-4 mt-3 d-flex justify-content-start border-bottom">
                                    <div class="gap-2 mt-3 d-flex align-items-start">
                                        <span class="p-2 rounded badge bg-label-primary"><i
                                                class='ti ti-briefcase ti-sm'></i></span>
                                        <div>
                                            <p class="mb-0 fw-medium">568</p>
                                            <small>Requêtes traitées</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-wrap pb-4 mt-3 d-flex justify-content-between border-bottom">
                                    <div class="gap-2 mt-3 d-flex align-items-center">
                                        <span class="p-2 rounded badge bg-label-success"><i
                                                class='ti ti-clock ti-sm'></i></span>
                                        <div>
                                            <p class="mb-0 fw-medium">300</p>
                                            <small>Dans les delais</small>
                                        </div>
                                    </div>
                                    <div class="gap-2 mt-3 d-flex align-items-center">
                                        <span class="p-2 rounded badge bg-label-danger"><i
                                                class='ti ti-clock ti-sm'></i></span>
                                        <div>
                                            <p class="mb-0 fw-medium">268</p>
                                            <small>Hors Délais</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->


    <!-- User Content -->
    <div class="order-1 col-xl-8 col-lg-7 col-md-7">
        <div class="mb-3 text-center card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="border nav-link {{ $details_active_btn }}" role="tab"
                            data-bs-toggle="tab" data-bs-target="#informations-personnellles-tabs"
                            aria-controls="informations-personnellles-tabs" aria-selected="true">
                            <i class="tf-icons ti ti-user ti-md me-1"></i> Détails
                        </button>
                    </li>
                    <li class="mx-1 nav-item">
                        <button type="button"
                            class="border nav-link @if($errors->rest_password_for_utilisateur->isNotEmpty()) {{'active show'}} @endif"
                            role="tab" data-bs-toggle="tab" data-bs-target="#securite-tabs"
                            aria-controls="securite-tabs" aria-selected="false">
                            <i class="tf-icons ti ti-lock ti-md me-1"></i> Sécurité
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="p-0 tab-content">
                    <div class="tab-pane fade  {{ $details_active_class }}" id="informations-personnellles-tabs"
                        role="tabpanel">
                        <!-- Basic with Icons -->
                        <div class="col-xxl">
                            <div class="mb-4 card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Mes informations Personnellles</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('admin.utilisateurs.update', $utilisateur)}}">
                                        @csrf
                                        @method('put')
                                        {{-- Prenoms et Nom --}}
                                        <div class="mb-3 row">
                                            {{-- Prenoms --}}
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label d-block text-start"
                                                    for="first_name">Prénoms</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="first_name" class="input-group-text"><i
                                                            class="ti ti-user"></i></span>
                                                    <input type="text" class="rounded-lg form-control" id="first_name"
                                                        name="first_name" placeholder="Prénoms" aria-label="Prénoms"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ $utilisateur->first_name }}" />
                                                </div>
                                                <x-input-error bag="edit_utilisateur" for="first_name" class="mt-2" />
                                            </div>

                                            {{-- Nom --}}
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label d-block text-start" for="last_name">Nom</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="last_name" class="input-group-text"><i
                                                            class="ti ti-user"></i></span>
                                                    <input type="text" class="rounded-lg form-control" id="last_name"
                                                        name="last_name" placeholder="Nom" aria-label="Nom"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ $utilisateur->last_name }}" />
                                                </div>
                                                <x-input-error bag="edit_utilisateur" for="last_name" class="mt-2" />
                                            </div>
                                        </div>

                                        {{-- telephone et Email --}}
                                        <div class="mb-3 row">
                                            {{-- Telephone --}}
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label d-block text-start"
                                                    for="telephone">Téléphone</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="telephone" class="input-group-text"><i
                                                            class="ti ti-phone"></i></span>
                                                    <input type="text" class="rounded-lg form-control" id="telephone"
                                                        name="telephone" placeholder="Téléphone" aria-label="Téléphone"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ $utilisateur->telephone }}" />
                                                </div>
                                                <x-input-error bag="edit_utilisateur" for="telephone" class="mt-2" />
                                            </div>

                                            {{-- Email --}}
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label d-block text-start" for="email">Adresse
                                                    Email</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="email" class="input-group-text"><i
                                                            class="ti ti-mail"></i></span>
                                                    <input type="email" class="rounded-lg form-control" id="email"
                                                        name="email" placeholder="Adresse Email"
                                                        aria-label="Adresse Email"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ $utilisateur->email }}" />
                                                </div>
                                                <x-input-error bag="edit_utilisateur" for="email" class="mt-2" />
                                            </div>
                                        </div>


                                        {{-- Genre (Homme/Femme) --}}
                                        <div class="mb-3 row">
                                            {{-- homme --}}
                                            {{-- <div class="mb-2 col-md mb-md-0">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content" for="sexe1">
                                                        <input name="sexe" class="form-check-input" type="radio"
                                                            value="homme" id="sexe1" checked />
                                                        <span class="custom-option-header">
                                                            <span class="mb-0 h6">Homme</span>
                                                            <span class="text-muted text-primary">
                                                                <i class="fa-solid fa-child fa-2xl"
                                                                    style="color: #74C0FC;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div> --}}

                                            {{-- femme --}}
                                            {{-- <div class="col-md">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content" for="sexe2">
                                                        <input name="sexe" class="form-check-input" type="radio"
                                                            value="femme" id="sexe2" />
                                                        <span class="custom-option-header">
                                                            <span class="mb-0 h6">Femme</span>
                                                            <span class="text-muted">
                                                                <i class="fa-solid fa-child fa-2xl"
                                                                    style="color: #ff80c0;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div> --}}
                                        </div>
                                        {{-- Genre (Homme/Femme) --}}


                                        <div class="m-0 justify-content-end row">
                                            <button type="submit"
                                                class="text-white bg-green-500 btn hover:bg-green-600 col-md-4">Enregistrer</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade {{ $password_active_class }}" id="securite-tabs" role="tabpanel">
                        <!-- Change Password -->
                        <div class="mb-4 {{ ($utilisateur->status == true) ? '':'bg-red-100' }} card">
                            <h5 class="mt-2 mb-0 card-header">Autorisations et Statut</h5>
                            <div class="mt-0 card-body">
                                @php
                                $action_name = ($utilisateur->status == true) ? 'bloquer cet utilisateur':'débloquer cet
                                utilisateur';
                                @endphp
                                <form method="post" action="{{ route('admin.utilisateurs.status', $utilisateur) }}"
                                    onsubmit="return confirm('Vous etes sur le point de {{ $action_name }}! Voulez-vous continuer ?');">
                                    @csrf
                                    @method('patch')
                                    <button type="submit"
                                        class="text-white ucfirst bg-{{ ($utilisateur->status == true) ? 'red' : 'green' }}-500 btn hover:bg-{{ ($utilisateur->status == true) ? 'red' : 'green' }}-600">{{
                                        ($utilisateur->status == true) ? 'bloquer' : 'débloquer' }} cet
                                        utilisateur</button>
                                </form>
                            </div>


                            {{-- <h5 class="card-header">Changer mon mot de Passe</h5>
                            <div class="card-body">
                                <form id="formChangePassword" method="GET" onsubmit="return false">
                                    <div class="mb-5 row form-password-toggle">
                                        <label class="form-label d-block text-start" for="current_password">Ancien Mot
                                            de passe</label>
                                        <div class="input-group input-group-merge">
                                            <input class="rounded-lg form-control" type="password" id="current_password"
                                                name="current_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="cursor-pointer input-group-text"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>


                                    <x-input-error bag="edit_utilisateur" for="adresse" class="mt-2" />
                                    <div class="row">
                                        <div class="mb-3 col-md-6 form-password-toggle">
                                            <label class="form-label d-block text-start" for="new_password">Nouveau Mot
                                                de passe</label>
                                            <div class="input-group input-group-merge">
                                                <input class="rounded-lg form-control" type="password" id="new_password"
                                                    name="new_password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="cursor-pointer input-group-text"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>


                                        <x-input-error bag="edit_utilisateur" for="adresse" class="mt-2" />

                                        <div class="mb-3 col-md-6 form-password-toggle">
                                            <label class="form-label d-block text-start"
                                                for="confirm_password">Confirmer Mot de passe</label>
                                            <div class="input-group input-group-merge">
                                                <input class="rounded-lg form-control" type="password"
                                                    id="confirm_password" name="confirm_password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="cursor-pointer input-group-text"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>


                                        <x-input-error bag="edit_utilisateur" for="adresse" class="mt-2" />
                                        <div class="m-0 justify-content-end row">
                                            <button type="submit" class="btn btn-danger col-md-4">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <!--/ Change Password -->
                        
                        <!-- Change Password -->
                        <div class="mb-4 {{ ($utilisateur->status == true) ? '':'bg-red-100' }} card">
                            <h5 class="mt-2 mb-0 card-header">Renitialiser le mot de passe</h5>

                            <div class="px-3 row">
                                @if (session('status'))
                                <div class="mb-4 text-sm font-medium text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <x-validation-errors class="mb-4" />

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="block col-6">
                                        <x-label for="email" value="{{ __('Email') }}" />
                                        <x-input id="email" class="block w-full mt-1" type="email" name="email"
                                            :value="$utilisateur->email" required autofocus autocomplete="username" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4 col-6">
                                        <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600">
                                            Envoyer {{ __('Email Password Reset Link') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--/ Change Password -->
                    </div>
                </div>
            </div>
        </div>

    </div>
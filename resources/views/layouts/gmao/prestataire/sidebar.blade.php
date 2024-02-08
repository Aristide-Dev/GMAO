@if (Auth::user())
    @php
        Auth::user()->abordIfNotAuthorized({["agent", "prestataire_admin"]});
    @endphp
@else
    @php
        abort(403, 'Unauthorized action.');
    @endphp
@endif
<ul class="py-1 menu-inner">
    <!-- Dashboards -->
    <x-gmao.nav-link :active="request()->routeIs('prestataires.dashboard')">
        <a href="{{ route('prestataires.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao.nav-link>

    <!-- Demandes -->
    <x-gmao.nav-link :active="request()->routeIs('prestataires.demandes.*')">
        <a href="{{ route('prestataires.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao.nav-link>

    <!-- Demandes -->
    <x-gmao.nav-link :active="request()->routeIs('prestataires.utilisateurs.*')">
        <a href="{{ route('prestataires.utilisateurs.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-users"></i>
            <div data-i18n="Utilisateurs">Utilisateurs</div>
        </a>
    </x-gmao.nav-link>
</ul>


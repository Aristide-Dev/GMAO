@if (Auth::user())
    @php
        Auth::user()->abordIfNotAuthorized("demandeur");
    @endphp
@else
    @php
        abort(403, 'Unauthorized action.');
    @endphp
@endif
<ul class="py-1 menu-inner">
    <!-- Dashboards -->
    <x-gmao.nav-link :active="request()->routeIs('demandeur.dashboard')">
        <a href="{{ route('demandeur.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao.nav-link>

    <!-- Demandes -->
    <x-gmao.nav-link :active="request()->routeIs('demandeur.demandes.*')">
        <a href="{{ route('demandeur.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao.nav-link>

    <!-- Demandes -->
    {{-- <x-gmao.nav-link :active="request()->routeIs('demandeur.sites.*')">
        <a href="{{ route('demandeur.sites.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Sites">Sites</div>
        </a>
    </x-gmao.nav-link> --}}
</ul>


@if (Auth::user())
    @php
        Auth::user()->abordIfNotAuthorized(['commercial']);
    @endphp
@else
    @php
        abort(403, 'Unauthorized action.');
    @endphp
@endif
<ul class="py-1 menu-inner">
    {{-- Dashboards --}}
    <x-gmao.nav-link :active="request()->routeIs('commercial.dashboard')">
        <a href="{{ route('commercial.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao.nav-link>

    {{-- Demandes --}}
    <x-gmao.nav-link :active="request()->routeIs('commercial.demandes.*')">
        <a href="{{ route('commercial.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao.nav-link>

    {{-- site --}}
    <x-gmao.nav-link :active="request()->routeIs('commercial.sites.*')">
        <a href="{{ route('commercial.sites.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Sites">Sites</div>
        </a>
    </x-gmao.nav-link>

    {{-- Zones --}}
    <x-gmao.nav-link :active="request()->routeIs('commercial.zones.*')">
        <a href="{{ route('commercial.zones.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-map-location-dot"></i>
            <div data-i18n="Zones & Priorités">Zones & Priorités</div>
        </a>
    </x-gmao.nav-link>

    {{-- Forfaits Contrat --}}
    <x-gmao.nav-link :active="request()->routeIs('commercial.forfaits.*')">
        <a href="{{ route('commercial.forfaits.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-gear"></i>
            <div data-i18n="Forfaits Contrat">Forfaits Contrat</div>
        </a>
    </x-gmao.nav-link>

    {{-- Formatiion --}}
    <x-gmao.nav-link :active="request()->routeIs('formations.index')">
        <a href="{{ route('formations.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-graduation-cap"></i>
            <div data-i18n="Formations">Formations</div>
        </a>
    </x-gmao.nav-link>
</ul>


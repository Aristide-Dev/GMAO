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
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.demandes.*')">
        <a href="{{ route('admin.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- site --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.sites.*')">
        <a href="{{ route('admin.sites.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Sites">Sites</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- prestataire --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.prestataires.*')">
        <a href="{{ route('admin.prestataires.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-users-gear"></i>
            <div data-i18n="Prestataires">Prestataires</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- utilisateur --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.utilisateurs.*')">
        <a href="{{ route('admin.utilisateurs.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-user-tie"></i>
            <div data-i18n="Utilisateurs">Utilisateurs</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- stock --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.pieces.*')">
        <a href="{{ route('admin.pieces.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-box-open"></i>
            <div data-i18n="Stock">Stock</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- Zones --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.zones.*')">
        <a href="{{ route('admin.zones.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-map-location-dot"></i>
            <div data-i18n="Zones & Priorités">Zones & Priorités</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- Forfaits Contrat --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.forfaits.*')">
        <a href="{{ route('admin.forfaits.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-gear"></i>
            <div data-i18n="Forfaits Contrat">Forfaits Contrat</div>
        </a>
    </x-gmao.nav-link> --}}

    {{-- Rapport mensuel --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.reports.*')">
        <a href="{{ route('admin.reports.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-gear"></i>
            <div data-i18n="Rapport mensuel">Rapport mensuel</div>
        </a>
    </x-gmao.nav-link> --}}

    @if(Auth::user()->role == 'super_admin')
    {{-- Rapport mensuel --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.secret.*')">
        <a href="{{ route('admin.secret.index') }}" class="menu-link">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                <path fill="#000000" d="M224 16c-6.7 0-10.8-2.8-15.5-6.1C201.9 5.4 194 0 176 0c-30.5 0-52 43.7-66 89.4C62.7 98.1 32 112.2 32 128c0 14.3 25 27.1 64.6 35.9c-.4 4-.6 8-.6 12.1c0 17 3.3 33.2 9.3 48l-59.9 0C38 224 32 230 32 237.4c0 1.7 .3 3.4 1 5l38.8 96.9C28.2 371.8 0 423.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-58.5-28.2-110.4-71.7-143L415 242.4c.6-1.6 1-3.3 1-5c0-7.4-6-13.4-13.4-13.4l-59.9 0c6-14.8 9.3-31 9.3-48c0-4.1-.2-8.1-.6-12.1C391 155.1 416 142.3 416 128c0-15.8-30.7-29.9-78-38.6C324 43.7 302.5 0 272 0c-18 0-25.9 5.4-32.5 9.9c-4.8 3.3-8.8 6.1-15.5 6.1zm56 208l-12.4 0c-16.5 0-31.1-10.6-36.3-26.2c-2.3-7-12.2-7-14.5 0c-5.2 15.6-19.9 26.2-36.3 26.2L168 224c-22.1 0-40-17.9-40-40l0-14.4c28.2 4.1 61 6.4 96 6.4s67.8-2.3 96-6.4l0 14.4c0 22.1-17.9 40-40 40zm-88 96l16 32L176 480 128 288l64 32zm128-32L272 480 240 352l16-32 64-32z"/>
            </svg>
            <div data-i18n="Secret">Secret</div>
        </a>
    </x-gmao.nav-link> --}}
    @endif
</ul>


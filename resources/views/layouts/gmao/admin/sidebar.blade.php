<ul class="py-1 menu-inner">
    {{-- Dashboards --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.dashboard')">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao.nav-link>

    {{-- Demandes --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.demandes.*')">
        <a href="{{ route('admin.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao.nav-link>

    {{-- site --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.sites.*')">
        <a href="{{ route('admin.sites.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Sites">Sites</div>
        </a>
    </x-gmao.nav-link>

    {{-- prestataire --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.prestataires.*')">
        <a href="{{ route('admin.prestataires.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-users-gear"></i>
            <div data-i18n="Prestataires">Prestataires</div>
        </a>
    </x-gmao.nav-link>

    {{-- utilisateur --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.utilisateurs.*')">
        <a href="{{ route('admin.utilisateurs.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-user-tie"></i>
            <div data-i18n="Utilisateurs">Utilisateurs</div>
        </a>
    </x-gmao.nav-link>

    {{-- stock --}}
    <x-gmao.nav-link :active="request()->routeIs('admin.stock.*')">
        <a href="{{ route('admin.stock.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-box-open"></i>
            <div data-i18n="Stock">Stock</div>
        </a>
    </x-gmao.nav-link>

    {{-- pieces --}}
    {{-- <x-gmao.nav-link :active="request()->routeIs('admin.pieces.*')">
        <a href="{{ route('admin.pieces.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Pieces">Pieces</div>
        </a>
    </x-gmao.nav-link> --}}
</ul>


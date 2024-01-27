<ul class="py-1 menu-inner">
    <!-- Dashboards -->
    <x-gmao-nav-link :active="request()->routeIs('admin.dashboard')">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao-nav-link>

    <!-- Demandes -->
    <x-gmao-nav-link :active="request()->routeIs('admin.demandes.*')">
        <a href="{{ route('admin.demandes.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-hand-holding-medical"></i>
            <div data-i18n="Demandes">Demandes</div>
        </a>
    </x-gmao-nav-link>

    <!-- Demandes -->
    <x-gmao-nav-link :active="request()->routeIs('admin.sites.*')">
        <a href="{{ route('admin.sites.index') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-screwdriver-wrench"></i>
            <div data-i18n="Sites">Sites</div>
        </a>
    </x-gmao-nav-link>
</ul>


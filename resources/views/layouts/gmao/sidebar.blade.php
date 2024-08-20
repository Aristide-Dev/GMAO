<ul class="py-1 menu-inner">
    <!-- Dashboards -->
    
    {{-- Dashboards --}}
    <x-gmao.nav-link :active="request()->routeIs('dashboard')">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Tableau de Bord">Tableau de Bord</div>
        </a>
    </x-gmao.nav-link>


    {{-- Dashboards --}}
    <x-gmao.nav-link :active="request()->routeIs('formations.index')">
        <a href="{{ route('formations.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Formations">Formations</div>
        </a>
    </x-gmao.nav-link>
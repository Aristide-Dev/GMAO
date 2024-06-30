<x-gmao-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title_desc">{{ __('Dashboard') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <!-- View sales -->
        <div class="mb-4 col-xl-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="mb-4 card-title">Content de vous revoir! 🎉</h5>
                            {{-- <p class="mb-2">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}</p> --}}
                            {{-- <h4 class="mb-1 text-primary">$48.9k</h4> --}}
                            <a href="javascript:;" class="mt-4 btn btn-primary">{{ Auth::user()?->first_name }} {{
                                Auth::user()?->last_name }}s</a>
                        </div>
                    </div>
                    <div class="text-center col-5 text-sm-left">
                        <div class="px-0 pb-0 card-body px-md-4">
                            @php
                            $userImageIllustration = ["card-advance-sale.png", "add-new-roles.png"];
                            @endphp
                            <img src="/storage/assets/img/illustrations/{{ $userImageIllustration[rand(0,1)] }}"
                                height="140" alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="mb-4 col-xl-8 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="mb-3 d-flex justify-content-between">
                        <h5 class="mb-0 card-title">Statistics</h5>
                        <small class="text-muted">--------------------------------</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        {{-- DEMANDES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-primary me-3">
                                    {{-- <i class="ti ti-chart-pie-2 ti-sm"></i> --}}
                                    <i class="menu-icon fa-solid fa-hand-holding-medical fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">230k</h6>
                                    <small>Demandes</small>
                                </div>
                            </div>
                        </div>
                        {{-- DEMANDES --}}

                        {{-- SITES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-info me-3">
                                    <i class="menu-icon fa-solid fa-screwdriver-wrench fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">
                                        <span class="text-danger">8.549k</span> / 100
                                    </h6>
                                    <small>Sites (actifs)</small>
                                </div>
                            </div>
                        </div>
                        {{-- SITES --}}

                        {{-- PRESTATAIRES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-danger me-3">
                                    <i class="menu-icon fa-solid fa-users-gear fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">1.423k</h6>
                                    <small>Prestataires</small>
                                </div>
                            </div>
                        </div>
                        {{-- PRESTATAIRES --}}

                        {{-- UTILISATEURS --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-success me-3">
                                    <i class="menu-icon fa-solid fa-user-tie fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">$9745</h6>
                                    <small>Utilisateurs</small>
                                </div>
                            </div>
                        </div>
                        {{-- UTILISATEURS --}}

                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->
    </div>


    <div class="row">
        <div class="p-3 my-3 col-12">
            <livewire:evolution-requetes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:top-10-pannes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:requete-by-equipement-type />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:requete-by-zone />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:cout-total-maintenance-by-site />
        </div>
    </div>
</x-gmao-layout>

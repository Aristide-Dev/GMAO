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
                            <h6 class="mb-0 font-bold">{{ $total_demande }}</h6>
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
                            <h6 class="mb-0 font-bold">
                                <span class="text-danger">{{ $total_site_active }}</span> / {{ $total_site }}
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
                            <h6 class="mb-0 font-bold">{{ $total_prestataire }}</h6>
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
                            <h6 class="mb-0 font-bold">{{ $total_users }}</h6>
                            <small>Utilisateurs</small>
                        </div>
                    </div>
                </div>
                {{-- UTILISATEURS --}}

            </div>
        </div>
    </div>
</div>
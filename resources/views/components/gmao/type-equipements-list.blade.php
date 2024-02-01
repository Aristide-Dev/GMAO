@props(['action'=> '', 'type_equipement'=> ''])

@php
    $url = "";
    switch ($action) {
        case 'admin':
            $url = "admin";
            break;
        case 'demandeur':
            $url = "demandeur";
            break;

        default:
            $url = "demandeur";
            break;
    }
    $url .=".sites.type_equipement";


@endphp

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'distributeur']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-primary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-gas-pump fa-2xl" style="color: #74C0FC;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">42</h4>
            </div>
            <h5 class="mb-1 fw-bold">Distributeur</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: #5c92bb;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: #5c92bb;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: #5c92bb;"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'stockage-et-tuyauterie']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-warning">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-database fa-2xl" style="color: #c0c0c0;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">8</h4>
            </div>
            <h5 class="mb-1 fw-bold">Stockage & Tuyauterie</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'forage']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-danger">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-bore-hole fa-2xl" style="color: #B197FC;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">27</h4>
            </div>
            <h5 class="mb-1 fw-bold">Forage</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'servicing']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-info">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-gears fa-2xl"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">13</h4>
            </div>
            <h5 class="mb-1 fw-bold">Servicing</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'branding']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-dark">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-ranking-star fa-2xl" style="color: #ff04ea;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">42</h4>
            </div>
            <h5 class="mb-1 fw-bold">Branding</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: #d805c6;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: #d805c6;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: #d805c6;"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'groupe-electrogene']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-success">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-charging-station fa-2xl" style="color: #ffff00;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">8</h4>
            </div>
            <h5 class="mb-1 fw-bold">Groupe électrogène</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: #ffc400;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: #ffc400;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: #ffc400;"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'electricite']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-danger">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-bolt fa-2xl" style="color: #ffff00;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">27</h4>
            </div>
            <h5 class="mb-1 fw-bold">Electricité</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: #ffa600;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: #ffa600;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: #ffa600;"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

<a href="{{ route($url, ['id' => rand(12,533), 'type_equipement' => 'equipement-incendie']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-secondary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-fire-extinguisher fa-2xl" style="color: #ff0000;"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">13</h4>
            </div>
            <h5 class="mb-1 fw-bold">Equipements incendie</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: #ff0000; border:2px;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: #ff0000; border:2px;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: #ff0000; border:2px;"></i>
                </li>
              </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">50 000 000 GNF</span>
            </p>
        </div>
    </div>
</a>

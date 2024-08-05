@props(['action'=> '', 'categorie_equipement'=> '', 'site'])

@if (!isset($site))
@php
throw new InvalidArgumentException('Le composant (add-equipement) nécessite une prop "site"');
@endphp
@endif
@php
$routeName = '';
switch ($action) {
case 'admin':
$routeName = 'admin.sites.equipement.categorie';
break;
case 'demandeur':
$routeName = 'demandeur.sites.equipement.categorie';
case 'commercial':
$routeName = 'commercial.sites.equipement.categorie';
default:
$routeName = 'commercial.sites.equipement.categorie';
break;
}


@endphp
{{-- distributeur --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'distributeur']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-primary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-gas-pump fa-2xl" style="color: {{ $site->categorieEquipementColor('distributeur') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('distributeur')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('distributeur') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('distributeur') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: {{ $site->categorieEquipementColor('distributeur') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('distributeur') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: {{ $site->categorieEquipementColor('distributeur') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('distributeur') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-gas-pump" style="color: {{ $site->categorieEquipementColor('distributeur') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('distributeur'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- distributeur --}}

{{-- stockage-et-tuyauterie --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'stockage-et-tuyauterie']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-warning">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-database fa-2xl" style="color: {{ $site->categorieEquipementColor('stockage-et-tuyauterie') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('stockage-et-tuyauterie')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('stockage-et-tuyauterie') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('stockage-et-tuyauterie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database" style="color: {{ $site->categorieEquipementColor('stockage-et-tuyauterie') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('stockage-et-tuyauterie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database" style="color: {{ $site->categorieEquipementColor('stockage-et-tuyauterie') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('stockage-et-tuyauterie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-secondary rounded-circle">
                    <i class="fa-solid fa-database" style="color: {{ $site->categorieEquipementColor('stockage-et-tuyauterie') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('stockage-et-tuyauterie'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- stockage-et-tuyauterie --}}

{{-- forage --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'forage']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-danger">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-bore-hole fa-2xl" style="color: {{ $site->categorieEquipementColor('forage') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('forage')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('forage') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('forage') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole" style="color: {{ $site->categorieEquipementColor('forage') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('forage') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole" style="color: {{ $site->categorieEquipementColor('forage') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('forage') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                    <i class="fa-solid fa-bore-hole" style="color: {{ $site->categorieEquipementColor('forage') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('forage'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- forage --}}

{{-- servicing --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'servicing']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-info">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-gears fa-2xl" style="color: {{ $site->categorieEquipementColor('servicing') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('servicing')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('servicing') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('servicing') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears" style="color: {{ $site->categorieEquipementColor('servicing') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('servicing') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears" style="color: {{ $site->categorieEquipementColor('servicing') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('servicing') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-dark rounded-circle">
                    <i class="fa-solid fa-gears" style="color: {{ $site->categorieEquipementColor('servicing') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('servicing'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- servicing --}}

{{-- branding --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'branding']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-dark">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-ranking-star fa-2xl" style="color: {{ $site->categorieEquipementColor('branding') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('branding')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('branding') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('branding') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: {{ $site->categorieEquipementColor('branding') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('branding') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: {{ $site->categorieEquipementColor('branding') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('branding') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-ranking-star" style="color: {{ $site->categorieEquipementColor('branding') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('branding'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- branding --}}

{{-- groupe-electrogene --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'groupe-electrogene']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-success">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-charging-station fa-2xl" style="color: {{ $site->categorieEquipementColor('groupe-electrogene') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('groupe-electrogene')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('groupe-electrogene') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('groupe-electrogene') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: {{ $site->categorieEquipementColor('groupe-electrogene') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('groupe-electrogene') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: {{ $site->categorieEquipementColor('groupe-electrogene') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('groupe-electrogene') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-charging-station" style="color: {{ $site->categorieEquipementColor('groupe-electrogene') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('groupe-electrogene'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- groupe-electrogene --}}

{{-- electricite --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'electricite']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-danger">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-bolt fa-2xl" style="color: {{ $site->categorieEquipementColor('electricite') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('electricite')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('electricite') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('electricite') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: {{ $site->categorieEquipementColor('electricite') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('electricite') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: {{ $site->categorieEquipementColor('electricite') }};"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('electricite') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-warning rounded-circle">
                    <i class="fa-solid fa-bolt" style="color: {{ $site->categorieEquipementColor('electricite') }};"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('electricite'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- electricite --}}

{{-- equipement-incendie --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'equipement-incendie']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-secondary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <i class="fa-solid fa-fire-extinguisher fa-2xl" style="color: {{ $site->categorieEquipementColor('equipement-incendie') }};"></i>
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('equipement-incendie')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('equipement-incendie') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('equipement-incendie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: {{ $site->categorieEquipementColor('equipement-incendie') }}; border:2px;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('equipement-incendie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: {{ $site->categorieEquipementColor('equipement-incendie') }}; border:2px;"></i>
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('equipement-incendie') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-danger rounded-circle">
                    <i class="text-center fa-sharp fa-solid fa-fire-extinguisher" style="color: {{ $site->categorieEquipementColor('equipement-incendie') }}; border:2px;"></i>
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('equipement-incendie'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- equipement-incendie --}}


{{-- compteur-et-pompes-de-transfert --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'compteur-et-pompes-de-transfert']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-primary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="" width="500px"  style="color: {{ $site->categorieEquipementColor('compteur-et-pompes-de-transfert') }};">
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('compteur-et-pompes-de-transfert')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('compteur-et-pompes-de-transfert'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- compteur-et-pompes-de-transfert --}}


{{-- compteur-et-pompes-de-transfert --}}
<a href="{{ route($routeName, ['site' => $site, 'categorie_equipement' => 'compteur-et-pompes-de-transfert']) }}" class="mb-4 col-md-4">
    <div class="card card-border-shadow-primary">
        <div class="card-body">
            <div class="pb-1 mb-2 d-flex align-items-center">
                <div class="avatar me-2">
                    <span class="rounded">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="" width="500px"  style="color: {{ $site->categorieEquipementColor('compteur-et-pompes-de-transfert') }};">
                    </span>
                </div>
                <h4 class="mb-0 ms-1">{{ count($site->equipementsByCategory('compteur-et-pompes-de-transfert')) }}</h4>
            </div>
            <h5 class="mb-1 fw-bold">{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}</h5>
            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $site->categorieEquipementText('compteur-et-pompes-de-transfert') }}" class="pt-1 text-center border align-items-center justify-content-center avatar avatar-sm pull-up bg-label-primary rounded-circle">
                        <img src="{{Storage::url('svg/compteur-et-pompes-de-transfert.svg')}}" alt="">
                </li>
            </ul>
            <p class="mb-0">
                <small class="text-muted">FORFAIT CONTRAT: </small>
                <span class="fw-medium me-1">{{ number_format($site->totalForfaitContratByCategory('compteur-et-pompes-de-transfert'), 0,'.',' ') }} F</span>
            </p>
        </div>
    </div>
</a>
{{-- compteur-et-pompes-de-transfert --}}


@props(['equipement', 'equipement', 'action' => 'demandeur'])

@if (!isset($equipement))
    @php
        throw new InvalidArgumentException('Le composant (equipement) nécessite une prop "equipement"');
    @endphp
@endif

@php
    $selected_icon = '';
    $etat = rand(1, 3);

    $etat_class = '';
    $etat_text = '';

    switch ($etat) {
        case '1':
            $etat_class = 'danger';
            $etat_text = "à l'arrêt";
            break;
        case '2':
            $etat_class = 'warning';
            $etat_text = 'en panne';
            break;
        case '3':
            $etat_class = 'success';
            $etat_text = 'Bon';
            break;

        default:
            # code...
            break;
    }

    switch ($equipement->categorie) {
        case 'distributeur':
            $selected_icon = '<i class="fa-solid fa-gas-pump fa-lg" style="color: #74C0FC;"></i>';
            $bg_image = asset('storage/assets/img/illustrations/distributtteur.jpg');
            break;
        case 'stockage-et-tuyauterie':
            $selected_icon = '<i class="fa-solid fa-database fa-lg" style="color: #c0c0c0;"></i>';
            $bg_image = asset('storage/assets/img/illustrations/stockage-et-tuyauterie.png');
            break;
        case 'forage':
            $selected_icon = '<i class="fa-solid fa-bore-hole fa-lg" style="color: #B197FC;"></i>';
            $bg_image = asset('storage/assets/img/illustrations/forage.png');
            break;
        case 'servicing':
            $selected_icon = '<i class="fa-solid fa-gears fa-lg"></i>';
            $bg_image = asset('storage/assets/img/illustrations/servicing.png');
            break;
        case 'branding':
            $selected_icon = '<i class="fa-solid fa-ranking-star fa-lg" style="color: #FFD43B;"></i>';
            // $bg_image = "https://img.freepik.com/premium-psd/3d-branding-icon_453897-1213.jpg?w=740";
            $bg_image = asset('storage/assets/img/illustrations/3d-branding-icon.avif');
            break;
        case 'groupe-electrogene':
            $selected_icon = '<i class="fa-solid fa-charging-station fa-lg" style="color: #ffff00;"></i>';
            $bg_image =
                'https://img.freepik.com/premium-photo/yellow-machine-with-black-top-that-says-yellow-thing_1034910-25945.jpg?w=740';
            break;
        case 'electricite':
            $selected_icon = '<i class="fa-solid fa-bolt fa-lg" style="color: #ffff00;"></i>';
            // $bg_image =
            'https://img.freepik.com/free-vector/electric-cables-lightning-realistic-composition_1284-26544.jpg?t=st=1717978679~exp=1717982279~hmac=2ea8b00a2926343af275745bd36508149e270de7eec2cd0eefef8999f5ab8e59&w=740';
            $bg_image = asset('storage/assets/img/illustrations/electricite.jpg');
            break;
        case 'equipement-incendie':
            $selected_icon = '<i class="fa-solid fa-fire-extinguisher fa-lg" style="color: #ff0000;"></i>';
            $bg_image =
                'https://img.freepik.com/free-vector/fire-extinguisger-frame-with-clear-piece-paper-wooden-surface-with-fire-suppression-bottle-units-illustration_1284-29510.jpg?t=st=1717978783~exp=1717982383~hmac=89e36bc6fea9970ebccd6330623094ff0e9982603c218890fef695cfaf7de842&w=740';
            break;
        case 'compteur-et-pompes-de-transfert':
            $selected_icon = '<i class="fa-solid fa-fire-extinguisher fa-lg" style="color: #ff0000;"></i>';
            $bg_image = Storage::url('assets/img/compteur-et-pompes-de-transfert.png');
            break;
        case 'autres-equipements-et-immobiliers':
            $selected_icon = '<i class="fa-solid fa-fire-extinguisher fa-lg" style="color: #ff0000;"></i>';
            $bg_image = asset('storage/assets/img/illustrations/autres-equipements-et-immobiliers.png');
            break;
        default:
            $selected_icon = '';
            break;
    }

@endphp

<!-- Upcoming Webinar -->
<div class="mb-4 col-md-6">
    <div class="card shadow-3xl" style="height: auto;">
        <div class="bg-white card-body">
            <div class="pt-4 mb-3 text-center bg-label-primary rounded-3 w-100"
                style="height:200px; background-image: url('{{ $bg_image }}'); background-size:90%; background-position:center; background-repeat:no-repeat;">
                {{-- <img class="img-fluid w-50" src="{{ $bg_image }}" alt="Card girl image" width="50" /> --}}
            </div>
            <div class="flex justify-between gap-1 mt-3 mb-0 border-b border-black rounded">
                <div class="row">
                    <div class="p-4 col-12">
                        <h3 class="mb-1 font-bold uppercase h4">{{ $equipement->name }}</h3>
                        <p class="mb-1 uppercase">Numero Serie: <span
                                class="font-bold ">{{ $equipement->numero_serie }}<span></p>
                        <p class="mb-1 uppercase">Forfait Contrat: <span
                                class="font-bold ">{{ number_format($equipement->forfait_contrat, 2, '.', ' ') }} F<span>
                        </p>
                    </div>
                </div>
                <div class="items-center justify-center w-auto h-100">
                    <div class="flex justify-center p-0 m-0 text-center h-100 rounded-3xl">
                        {!! $equipement->qr_code !!}
                    </div>
                </div>


            </div>


            <!-- Notification Style -->
            <div class="p-4 border-t border-black rounded col-12">
                <div class="demo-inline-spacing">
                    <div class="list-group">
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Marque</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->marque ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Type</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->type ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Produit</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->produit ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Année de fabrication</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->annee_fabrication ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Puissance</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->puissance ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Capacité</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->capacite ?? '---' }}</small>
                        </a>
                        
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="li-wrapper d-flex justify-content-start align-items-center">
                                <div class="list-content">
                                    <h6 class="mb-1">Observations</h6>
                                    {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                                </div>
                            </div>
                            <small class="font-bold">{{ $equipement->observations ?? '---' }}</small>
                        </a>
                    </div>
                </div>
            </div>
            <!--/ Notification Style -->

            <hr>

            @if ($action == 'admin')
                <div class="flex mt-3 justify-content-between">
                    <a href="{{ route('admin.sites.equipement.edit', ['site' => $equipement->site, 'equipement' => $equipement]) }}"
                        class="btn btn-warning"><i class="tf-icons ti ti-edit ti-sm me-1 animate-pulse"></i>
                        Editer
                    </a>
                        
                    <form method="POST"
                        action="{{ route('admin.sites.equipement.switchStatus', ['site' => $equipement->site, 'equipement' => $equipement]) }}">
                        @csrf
                        @method('patch')
                        <button type="submit" class="text-white bg-yellow-500 btn hover:bg-yellow-600">
                            <i class="fa-solid fa-triangle-exclamation fa-sm me-1 animate-pulse"></i>
                            Désactiver
                        </button>
                    </form>
                    
                    <form method="POST"
                        action="{{ route('admin.sites.equipement.destroy', ['site' => $equipement->site, 'equipement' => $equipement]) }}"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-white bg-red-500 btn hover:bg-red-600"><i
                                class="tf-icons ti ti-trash ti-sm me-1 animate-pulse"></i>
                            Supprimer
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
<!--/ Upcoming Webinar -->

@props(['equipement','equipement', 'action'=>  'demandeur'])

@if (!isset($equipement))
    @php
        throw new InvalidArgumentException('Le composant (equipement) nécessite une prop "equipement"');
    @endphp
@endif

@php
$selected_icon = "";
$etat = rand(1,3);

$etat_class = "";
$etat_text = "";

switch ($etat) {
case '1':
$etat_class = "danger";
$etat_text = "à l'arrêt";
break;
case '2':
$etat_class = "warning";
$etat_text = "en panne";
break;
case '3':
$etat_class = "success";
$etat_text = "Bon";
break;

default:
# code...
break;
}


switch ($equipement->categorie) {
case 'distributeur':
$selected_icon = '<i class="fa-solid fa-gas-pump fa-lg" style="color: #74C0FC;"></i>';
$bg_image = Storage::url('assets/img/illustrations/distributtteur.jpg');
break;
case 'stockage-et-tuyauterie':
$selected_icon = '<i class="fa-solid fa-database fa-lg" style="color: #c0c0c0;"></i>';
$bg_image = "https://img.freepik.com/premium-psd/3d-rendering-gas-air-tank-transparent-background-ai-generated_768733-37689.jpg?w=300";
break;
case 'forage':
$selected_icon = '<i class="fa-solid fa-bore-hole fa-lg" style="color: #B197FC;"></i>';
$bg_image = "";
break;
case 'servicing':
$selected_icon = '<i class="fa-solid fa-gears fa-lg"></i>';
$bg_image = "https://img.freepik.com/premium-psd/mechanic-servicing-car_1101614-71739.jpg?w=740";
break;
case 'branding':
$selected_icon = '<i class="fa-solid fa-ranking-star fa-lg" style="color: #FFD43B;"></i>';
// $bg_image = "https://img.freepik.com/premium-psd/3d-branding-icon_453897-1213.jpg?w=740";
$bg_image = Storage::url("assets/img/illustrations/3d-branding-icon.avif");
break;
case 'groupe-electrogene':
$selected_icon = '<i class="fa-solid fa-charging-station fa-lg" style="color: #ffff00;"></i>';
$bg_image = "https://img.freepik.com/premium-photo/yellow-machine-with-black-top-that-says-yellow-thing_1034910-25945.jpg?w=740";
break;
case 'electricite':
$selected_icon = '<i class="fa-solid fa-bolt fa-lg" style="color: #ffff00;"></i>';
// $bg_image = "https://img.freepik.com/free-vector/electric-cables-lightning-realistic-composition_1284-26544.jpg?t=st=1717978679~exp=1717982279~hmac=2ea8b00a2926343af275745bd36508149e270de7eec2cd0eefef8999f5ab8e59&w=740";
$bg_image = Storage::url("assets/img/illustrations/electricite.jpg");
break;
case 'equipement-incendie':
$selected_icon = '<i class="fa-solid fa-fire-extinguisher fa-lg" style="color: #ff0000;"></i>';
$bg_image = "https://img.freepik.com/free-vector/fire-extinguisger-frame-with-clear-piece-paper-wooden-surface-with-fire-suppression-bottle-units-illustration_1284-29510.jpg?t=st=1717978783~exp=1717982383~hmac=89e36bc6fea9970ebccd6330623094ff0e9982603c218890fef695cfaf7de842&w=740";
break;
default:
$selected_icon = '';
break;
}



@endphp
{{-- <div class="block p-2 mb-3 border rounded bg-label-light">
    <h6 class="block my-3 text-center w-100 badge bg-danger">Nombre de Pannes</h6>
    <div class="p-0 m-0 row d-flex justify-content-between">
        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">Jan 2024</small>
            </div>
            <small class="pt-1 my-2 text-dark h6">{{ rand(1,5) }}</small>
            <div class="progress w-100" style="height:10px">
                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                    aria-valuemax="100">65%</div>
            </div>
        </div>

        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">Cette Année</small>
            </div>
            <small class="pt-1 my-2 text-dark h6">{{ rand(5,23) }}</small>
            <div class="progress w-100" style="height:10px">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
        </div>


        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">General</small>
            </div>
            <small class="pt-1 my-2 text-dark h6">{{ rand(30,50) }}</small>
            <div class="progress w-100" style="height:10px">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65"
                    aria-valuemin="0" aria-valuemax="100">65%</div>
            </div>
        </div>

    </div>

    <hr>


    <h6 class="block my-3 text-center w-100 badge bg-success">Depenses</h6>
    <div class="p-0 m-0 row d-flex justify-content-between">
        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">Jan 2024</small>
            </div>
            <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                ') }} GNF</small>
        </div>

        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">Cette Année</small>
            </div>
            <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                ') }} GNF</small>
        </div>


        <div class="col-4">
            <div class="justify-content-center d-flex align-items-center">
                <div class="p-2 rounded badge bg-label-secondary">
                    <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                </div>
                <small class="mb-0 fw-bold text-dark">General</small>
            </div>
            <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                ') }} GNF</small>
        </div>

    </div>
</div> --}}
<!-- Upcoming Webinar -->
<div class="mb-4 col-md-6">
    <div class="card shadow-3xl" style="height: auto;">
        <div class="bg-white card-body">
            <div class="pt-4 mb-3 text-center bg-label-primary rounded-3 w-100" style="background-image: url('{{ $bg_image }}'); background-size:cover; background-position:center; background-repeat:no-repeat; height:150px;">
                {{-- <img class="img-fluid w-50" src="{{ $bg_image }}"
                    alt="Card girl image" width="50"/> --}}
            </div>
            <div class="flex justify-between gap-1 my-3">
                <div class=">
                    <h3 class="mb-1 font-bold uppercase h4">{{ $equipement->name }}</h3>
                    <p class="mb-1 uppercase">Numero Serie: <span class="font-bold ">{{ $equipement->numero_serie }}<span></p>
                </div>
                <div class="items-center justify-center w-auto h-100">
                    <div class="flex justify-center p-0 m-0 text-center h-100 rounded-3xl">
                        {!! $equipement->qr_code !!}
                    </div>
                </div>
            </div>
            <div class="flex p-1 mx-auto mb-3 bg-yellow-200 shadow-xl rounded-xl row align-items-center justify-content-between">
                <div class="col">
                    <div class="d-flex">
                        <div>
                            <h6 class="mb-0 text-nowrap">Etat</h6>
                            <p class="mb-0 badge bg-{{ $etat_class }}">{{ $etat_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-0 d-flex text-end">
                        <div>
                            <h6 class="m-0 mb-0 text-nowrap">Forfait Contrat</h6>
                            <p class="m-0 mb-0 fw-bolder">{{ number_format($equipement->forfait_contrat, 2, "."," ") }} F</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block p-2 mb-3 border rounded bg-gray-50 shadow-3xl">
                <h6 class="block my-3 text-center text-white bg-red-400 w-100 badge shadow-3xl">Nombre de Pannes</h6>
                <div class="gap-1 p-0 m-0 row d-flex justify-content-between">
                    <div class="p-2 m-0 text-center bg-white shadow-xl col-3 rounded-3xl">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Jan 2024</small>
                        </div>
                        <small class="pt-1 my-2 text-dark h6">{{ rand(1,5) }}</small>
                    </div>

                    <div class="p-2 m-0 text-center bg-white shadow-xl col-3 rounded-3xl">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Cette Année</small>
                        </div>
                        <small class="pt-1 my-2 text-dark h6">{{ rand(5,23) }}</small>
                    </div>


                    <div class="p-2 m-0 text-center bg-white shadow-xl col-3 rounded-3xl">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">General</small>
                        </div>
                        <small class="pt-1 my-2 text-dark h6">{{ rand(30,50) }}</small>
                    </div>

                </div>
            </div>

                <hr>


            <div class="block p-2 mt-3 border rounded bg-gray-50 shadow-3xl">
                <h6 class="block my-3 text-center w-100 badge bg-success">Depenses</h6>
                <div class="p-0 m-0 row d-flex justify-content-between">
                    <div class="col-4">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Jan 2024</small>
                        </div>
                        <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                            ') }} GNF</small>
                    </div>

                    <div class="col-4">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Cette Année</small>
                        </div>
                        <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                            ') }} GNF</small>
                    </div>


                    <div class="col-4">
                        <div class="justify-content-center d-flex align-items-center">
                            <div class="p-2 rounded badge bg-label-secondary">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">General</small>
                        </div>
                        <small class="pt-1 my-2 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '
                            ') }} GNF</small>
                    </div>

                </div>
            </div>

            @if($action == 'admin')
            <div class="flex mt-3 justify-content-between">
                <a href="{{ route('admin.sites.equipement.edit',['site' => $equipement->site, 'equipement'=> $equipement]) }}" class="btn btn-warning"><i class="tf-icons ti ti-edit ti-sm me-1 animate-pulse"></i>
                    Editer</a>
                <form method="POST" action="{{ route('admin.sites.equipement.destroy',['site' => $equipement->site, 'equipement'=> $equipement]) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-white bg-red-500 btn hover:bg-red-600"><i class="tf-icons ti ti-trash ti-sm me-1 animate-pulse"></i>
                        Supprimer
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
<!--/ Upcoming Webinar -->




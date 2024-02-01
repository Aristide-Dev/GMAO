@props(['type_equipement'=> ""])

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


switch ($type_equipement) {
case 'distributeur':
$selected_icon = '<i class="fa-solid fa-gas-pump fa-lg" style="color: #74C0FC;"></i>';
break;
case 'stockage-et-tuyauterie':
$selected_icon = '<i class="fa-solid fa-database fa-lg" style="color: #c0c0c0;"></i>';
break;
case 'forage':
$selected_icon = '<i class="fa-solid fa-bore-hole fa-lg" style="color: #B197FC;"></i>';
break;
case 'servicing':
$selected_icon = '<i class="fa-solid fa-gears fa-lg"></i>';
break;
case 'branding':
$selected_icon = '<i class="fa-solid fa-ranking-star fa-lg" style="color: #FFD43B;"></i>';
break;
case 'groupe-electrogene':
$selected_icon = '<i class="fa-solid fa-charging-station fa-lg" style="color: #ffff00;"></i>';
break;
case 'electricite':
$selected_icon = '<i class="fa-solid fa-bolt fa-lg" style="color: #ffff00;"></i>';
break;
case 'equipement-incendie':
$selected_icon = '<i class="fa-solid fa-fire-extinguisher fa-lg" style="color: #ff0000;"></i>';
break;
default:
$selected_icon = '';
break;
}


@endphp

<!-- Project Status -->
<div class="mb-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="mb-3 d-flex align-items-start">
                <div class="p-2 rounded badge me-3 bg-label-secondary">{!! $selected_icon !!}</div>
                <div class="gap-2 d-flex justify-content-between w-100 align-items-center">
                    <div class="me-2">
                        <h6 class="mb-0">{{ $type_equipement }} {{ rand(1,5) }}</h6>
                    </div>
                </div>
            </div>
            <div id="projectStatusChart"></div>
            <div class="mb-3 d-flex justify-content-between">
                <h6 class="mb-0">Etat</h6>
                <div class="d-flex">
                    <p class="mb-0 badge bg-{{ $etat_class }}">{{ $etat_text }}</p>
                </div>
            </div>
            <div class="pb-1 mb-3 d-flex justify-content-between">
                <p class="mb-0">Forfait Contrat</p>
                <div class="d-flex">
                    <p class="mb-0 me-3 fw-bolder">{{ number_format(rand(10000,900000), 2, "."," ") }} F</p>
                </div>
            </div>
            <div class="border rounded p-2 mb-3 block bg-label-light">
                <h6 class="text-center block w-100 my-3 badge bg-danger">Nombre de Pannes</h6>
                <div class="row d-flex justify-content-between m-0 p-0">
                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Jan 2024</small>
                        </div>
                        <small class="my-2 pt-1 text-dark">{{ rand(1,5) }}</small>
                        <div class="progress w-100" style="height:10px">
                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Cette Année</small>
                        </div>
                        <small class="my-2 pt-1 text-dark">{{ rand(5,23) }}</small>
                        <div class="progress w-100" style="height:10px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-screwdriver-wrench fa-lg" style="color: #808080;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">General</small>
                        </div>
                        <small class="my-2 pt-1 text-dark">{{ rand(30,50) }}</small>
                        <div class="progress w-100" style="height:10px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                        </div>
                    </div>

                </div>

                <hr>


                <h6 class="text-center block w-100 my-3 badge bg-success">Depenses</h6>
                <div class="row d-flex justify-content-between m-0 p-0">
                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Jan 2024</small>
                        </div>
                        <small class="my-2 pt-1 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '  ') }} GNF</small>
                    </div>

                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">Cette Année</small>
                        </div>
                        <small class="my-2 pt-1 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '  ') }} GNF</small>
                    </div>


                    <div class="col-4">
                        <div class="d-flex gap-1 align-items-center">
                            <div class="badge rounded bg-label-secondary p-2">
                                <i class="fa-solid fa-sack-dollar fa-lg" style="color: #804000;"></i>
                            </div>
                            <small class="mb-0 fw-bold text-dark">General</small>
                        </div>
                        <small class="my-2 pt-1 badge bg-label-dark w-100 fw-bolder">{{ number_format(rand(50000,5000000), 2, ",", '  ') }} GNF</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


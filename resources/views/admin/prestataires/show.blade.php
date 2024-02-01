<x-gmao-layout>
    <x-slot name="title">{{ __('Prestataires') }}</x-slot>
    <x-slot name="title_desc">{{ __('Prestataires') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    @php
    $colors =
    [
    "primary",
    "danger",
    "warning",
    "success",
    ]
    @endphp

    <div class="mx-1 p-2 border bg-light shadow-lg">
        <h3>Indice de performance</h3>
        <div class="row d-flex justify-between m-0 p-0">

            <div class="col-md-4 p-3 bg-white rounded">
                <div class="d-flex gap-1 align-items-center d-flex">
                    <div class="badge rounded bg-label-danger p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Ce Mois-Ci</h6> -
                    <p class="mb-0 badge bg-dark d-end">Fev 2024</p>
                </div>
                <h4 class="my-2 pt-1">20%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="progress w-75 border" style="height:4px">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="float-end badge bg-danger mt-0">Mauvais</span>
                </div>
            </div>

            <div class="col-md-4 p-3 bg-white border rounded">
                <div class="d-flex gap-1 align-items-center">
                    <div class="badge rounded bg-label-warning p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Cette Année</h6> -
                    <p class="mb-0 badge bg-dark d-end">2024</p>
                </div>
                <h4 class="my-2 pt-1">35%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="progress w-75" style="height:4px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="float-end badge bg-warning mt-0">Moyen</span>
                </div>
            </div>

            <div class="col-md-4 p-3 bg-white border rounded">
                <div class="d-flex gap-1 align-items-center">
                    <div class="badge rounded bg-label-primary p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                    <h6 class="mb-0">Général</h6> -
                    <p class="mb-0 badge bg-dark d-end">2023 - 2024</p>
                </div>
                <h4 class="my-2 pt-1">80%</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="progress w-75" style="height:4px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="float-end badge bg-primary mt-0">Bon</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-md-6 mb-4 mb-md-2">
            <p class="text-light fw-medium">Liste des agents du prestataire</p>
            <div class="accordion mt-3" id="prestataireAgentListAccordion">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="prestataireAgentListheadingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#prestataireAgentListaccordionThree" aria-expanded="false" aria-controls="prestataireAgentListaccordionThree">
                            Afficher la liste des agents
                        </button>
                    </h2>
                    <div id="prestataireAgentListaccordionThree" class="accordion-collapse collapse" aria-labelledby="prestataireAgentListheadingThree" data-bs-parent="#prestataireAgentListAccordion">
                        <div class="accordion-body overflow-hidden">
                            <div class="table-responsive w-auto">
                                <table class="table table-borderless border-top">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th>Agent</th>
                                            <th class="text-left py-0 px-1">Interventions</th>
                                            <th class="text-left py-0 px-1">Performences</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 15; $i++) <tr>
                                            <td>
                                                <div class="d-flex align-items-center mt-lg-3">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="/storage/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-0">{{ fake()->name }}</h6>
                                                        <small class="text-truncate text-muted">{{ fake()->email }}</small>
                                                        <small class="text-truncate text-muted">{{ fake()->phoneNumber }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="mb-0 fw-medium">33</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="mb-0 fw-medium badge bg-{{ $colors[rand(0,3)] }}">{{ rand(0,100) }} %</p>
                                            </td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6 mb-4 mb-md-2">
            <p class="text-light fw-medium">Rescentes intervetions du prestataire</p>
            <div class="accordion mt-3" id="prestataireLastOperationsAccordion">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="prestataireLastOperationsheadingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#prestataireLastOperationsaccordionThree" aria-expanded="false" aria-controls="prestataireLastOperationsaccordionThree">
                            Afficher la liste des rescentes intervetions
                        </button>
                    </h2>
                    <div id="prestataireLastOperationsaccordionThree" class="accordion-collapse collapse" aria-labelledby="prestataireLastOperationsheadingThree" data-bs-parent="#prestataireLastOperationsAccordion">
                        <div class="accordion-body overflow-hidden">
                            <div class="table-responsive">
                                <table class="table table-borderless border-top">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th>CARD</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>TREND</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="me-3">
                                                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <p class="mb-0 fw-medium">*4230</p><small class="text-muted">Credit</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 fw-medium">Sent</p>
                                                    <small class="text-muted text-nowrap">17 Mar 2022</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-label-success">Verified</span></td>
                                            <td>
                                                <p class="mb-0 fw-medium">+$1,678</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="me-3">
                                                        <img src="../../assets/img/icons/payments/master-card-img.png" alt="Visa" height="30">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <p class="mb-0 fw-medium">*5578</p><small class="text-muted">Credit</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 fw-medium">Sent</p>
                                                    <small class="text-muted text-nowrap">12 Feb 2022</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-label-danger">Rejected</span></td>
                                            <td>
                                                <p class="mb-0 fw-medium">-$839</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="me-3">
                                                        <img src="../../assets/img/icons/payments/american-express-img.png" alt="Visa" height="30">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <p class="mb-0 fw-medium">*4567</p><small class="text-muted">ATM</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 fw-medium">Sent</p>
                                                    <small class="text-muted text-nowrap">28 Feb 2022</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-label-success">Verified</span></td>
                                            <td>
                                                <p class="mb-0 fw-medium">+$435</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="me-3">
                                                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <p class="mb-0 fw-medium">*5699</p><small class="text-muted">Credit</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 fw-medium">Sent</p>
                                                    <small class="text-muted text-nowrap">8 Jan 2022</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-label-secondary">Pending</span></td>
                                            <td>
                                                <p class="mb-0 fw-medium">+$2,345</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="me-3">
                                                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <p class="mb-0 fw-medium">*5699</p><small class="text-muted">Credit</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 fw-medium">Sent</p>
                                                    <small class="text-muted text-nowrap">8 Jan 2022</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-label-danger">Rejected</span></td>
                                            <td>
                                                <p class="mb-0 fw-medium">-$234</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-gmao-layout>


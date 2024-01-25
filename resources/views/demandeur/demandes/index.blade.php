<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>

    @php
    $statuts = [
        [
            'statut' => 'en attente de validation',
            'color' => 'warning',
        ],
        [
            'statut' => 'transmise au prestataire',
            'color' => 'primary',
        ],
        [
            'statut' => 'annulée',
            'color' => 'danger',
        ],
        [
            'statut' => 'rejettée',
            'color' => 'danger',
        ],
    ];
    @endphp


    <!-- Offcanvas to add new demande -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvelle demande d'intervention</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
            <form class="pt-0 add-new-demande" id="addNewDemandeForm" onsubmit="return false">
                <div class="mb-3">
                    <label class="form-label" for="site">site</label>
                    <select id="site" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                        <option value="matam">matam</option>
                        <option value="dixiin">dixiin</option>
                        <option value="mamou">mamou</option>
                        <option value="coyah">coyah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="equipement">Equipement</label>
                    <select id="equipement" name="equipement" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                        <option value="cuve">cuve</option>
                        <option value="distributeur">distributeur</option>
                        <option value="pompe">pompe</option>
                    </select>
                </div>
                <div class="mb-3 row">
                    <div class="mb-4 col-md-6 col-12">
                        <label for="bs-datepicker-format" class="form-label">Date de déclaration</label>
                        <input type="date" id="bs-datepicker-format" format="dd/mm/yyyy" placeholder="JJ/MM/AAAA" class="form-control"/>
                    </div>
                    <div class="mb-4 col-md-6 col-12">
                        <label for="bs-datepicker-format" class="form-label">Heure de déclaration</label>
                        <input type="time" id="bs-datepicker-format" placeholder="JJ/MM/AAAA" class="form-control"/>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="decrivez la panne"></textarea>
                </div>

                <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
                <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
            </form>
        </div>
    </div>

    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                        <span class="d-none d-sm-inline-block">Nouvelle Demande</span>
                        <span class="d-md-none">Ajouter</span>
                    </button>
                </div>
                <div class="col-12">
                    <h5>Vos demandes d'interventions</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos demandes d'interventions</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Equipement</th>
                            <th class="p-2">Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @for ($i = 0; $i < 30; $i++)
                            <tr>
                                <td>
                                    {{ $i+1 }}
                                </td>
                                <td>
                                    <span class="fw-bold">DI0000{{ rand(1,200) }}</span>
                                </td>
                                <td class="text-left">
                                    {{ fake()->name }}
                                </td>
                                <td class="text-left">{{ fake()->name }}</td>
                                <td class="p-2 text-wrap">
                                    {{ fake()->paragraph }}
                                </td>
                                <td>
                                    @php
                                        $st = $statuts[rand(0,3)];
                                    @endphp
                                    <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Equipement</th>
                            <th class="p-2">Description</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


            @for ($i = 0; $i < 30; $i++)
            <div class="p-2 m-2 mb-4 border rounded-lg shadow card d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">DI0000{{ rand(1,200) }}</h5>
                        <div class="card-title-elements ms-auto">
                            <button type="button" class="btn btn-icon btn-sm btn-danger">
                                <span class="tf-icon ti-xs ti ti-brand-shopee"></span>
                            </button>
                        </div>
                    </div>
                    <h6 class="card-title"><span class="h5">site</span>: <span class="text-muted">{{ fake()->name }}</span></h6>
                    <div class="mb-3 card-subtitle text-muted"><span class="h6">Equipement: </span>{{ fake()->name }}</div>
                    <div class="mb-3 card-subtitle">
                        @php
                        $st = $statuts[rand(0,3)];
                        @endphp
                        <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                    </div>

                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="{{ route('demandeur.demandes.show', rand(1,5)) }}" class="card-link btn btn-primary">Details</a>
                </div>
            </div>
            @endfor


        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


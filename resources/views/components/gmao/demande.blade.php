<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge bg-primary bg-label-primary">
        Demande d'Intervention <i class="fa-solid fa-circle-check fa-2xl" style="color: #63E6BE;"></i>
    </div>

    {{-- Demande d'intervention (D.I) --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                         D.I
                    </h6>
                </div>
                <small class="mb-1 w-30">DI3030381</small>
            </div>
        </div>
    </div>
    {{-- Demande d'intervention (D.I) --}}

    {{-- Demandeur --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                         Demandeur
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ fake()->firstname }} {{ fake()->lastname }}</small>
            </div>
        </div>
    </div>
    {{-- Demandeur --}}

    {{-- Site & Type Equipepement --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group list-group-item-action">
            <div class="row">
                <div class="col-6">
                    <div class="mt-1 border-0 border-end list-group-item">
                        <div class="d-block w-100 justify-content-between">
                            <p class="mb-1 text-left text-primary fw-bold">
                                <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                Site
                            </p>
                            <p class="mb-1 text-left">ST-Dubreka</p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="border-0 list-group-item">
                        <div class="w-100 justify-content-end">
                            <p class="mb-1 text-end text-primary fw-bold">
                                <i class="fa-solid fa-ellipsis ti-sm" style="color: #C0C0C0;"></i>
                                Type Equipement
                            </p>
                            <p class="mb-1 text-end">Distributeur</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- Site & Type Equipepement --}}

    {{-- Date & Heure de déclaration --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                         Date et heure de déclaration
                    </h6>
                </div>
                <small class="mb-1 w-30">25 fev 2024 <span class="fw-bold">à 15h30</span> </small>
            </div>
        </div>
    </div>
    {{-- Date & Heure de déclaration --}}

    {{-- Description --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                         Description
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ fake()->paragraph }}</small>
            </div>
        </div>
    </div>
    {{-- Description --}}
</div>

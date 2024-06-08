<x-gmao-layout>
    <x-slot name="title">{{ __('Prestataires') }}</x-slot>
    <x-slot name="title_desc">{{ __('Prestataires') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    @php
    $indices_performance = [
        [
            'statut' => 'Mauvais',
            'color' => 'danger',
            'value' => rand(0,100),
        ],
        [
            'statut' => 'Moyen',
            'value' => rand(0,100),
            'color' => 'warning',
        ],
        [
            'statut' => 'Bon',
            'value' => rand(0,100),
            'color' => 'primary',
        ],
        [
            'statut' => 'Excellent',
            'value' => rand(0,100),
            'color' => 'success',
        ],
    ];
    @endphp

    <x-breadcrumb :data="['Prestataires'=> '']"/>

    <div class="app-academy">
        <div class="p-0 mb-4 card">
            <div class="p-0 pt-4 pb-4 shadow-xl card-body d-flex flex-column flex-md-row justify-content-between">
                <div class="hidden py-0 w-25 card-body md:block animate-pulse">
                    <img src="/storage/assets/img/illustrations/bulb-light.png" class="h-50" alt="Bulb in hand" height="53" />
                </div>
                <div class=" card-body w-100 d-flex align-items-md-center flex-column text-md-center">
                    <h3 class="mb-1 card-title h3">
                        <span class="fw-bold text-primary fw-medium text-nowrap">Prestataires</span>
                    </h3>
                    <p class="mb-3 w-100">
                        <p class="fw-bold">Bienvenue sur la page de d'administration des prestataires.</p>
                        <p class="text-justify">
                            Cette section vous permet de consulter et de gérer les informations des prestataires enregistrés dans le système.
                            Les prestataires sont des acteurs essentiels dans notre processus de maintenance, et cette page vous offre une vue d'ensemble de ceux qui sont associés à votre entreprise.
                        </p>
                    </p>
                </div>
                <div class="hidden w-25 d-flex align-items-end justify-content-end md:block">
                    <img src="/storage/assets/img/illustrations/black-man-with-a-beard.png" alt="pencil rocket" height="53" class="hidden h-50 md:block" />
                </div>
            </div>
        </div>

        <livewire:prestataires />
    </div>
</x-gmao-layout>


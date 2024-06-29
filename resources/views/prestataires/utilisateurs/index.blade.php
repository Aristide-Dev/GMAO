<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateur') }}</x-slot>
    <x-slot name="title_desc">{{ __('Utilisateur') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>


    @php
    $statuts = [
        [
            'statut' => 'actif',
            'color' => 'success',
        ],
        [
            'statut' => 'désactivé',
            'color' => 'danger',
        ],
    ];
    $roles = [
        [
            'role' => 'prestataires',
            'color' => 'primary',
        ],
        [
            'role' => 'agent maintenance',
            'color' => 'info',
        ],
        [
            'role' => 'demandeur',
            'color' => '',
        ],
    ];

    $action = "";
    $action = (Auth::user()->role == 'prestataire_admin') ? 'gerant':'agent';
    @endphp


    <x-gmao.prestataire-create-user/>

    <livewire:prestataire-users-table  action_name="{{ $action }}"/>
</x-gmao-layout>


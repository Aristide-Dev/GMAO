<x-gmao-layout>

    @php
    $type_equipement = request('type_equipement') ?? "";
    @endphp
    <x-slot name="title">{{ __('Site') }} - <span class="fw-bold">{{ $type_equipement ?? "" }}</span> - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="title_desc">{{ __('Site') }} - <span class="fw-bold">{{ $type_equipement ?? "" }}</span> - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>


    @php
        $list_type_equipement = [
            'distributeur',
            'stockage-et-tuyauterie',
            'forage',
            'servicing',
            'branding',
            'groupe-electrogene',
            'equipement-incendie',
        ];
    @endphp

    <div class="row">
        @for ($i = 0; $i < rand(1,5); $i++)
    <x-gmao.equipement type_equipement="{{ $type_equipement }}"/>
    @endfor
    </div>




</x-gmao-layout>


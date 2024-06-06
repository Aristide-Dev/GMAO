<x-gmao-layout>

    <x-slot name="title">{{ $site->name }} - {{ $type_equipement ?? "" }} - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="title_desc">{{ $site->name }} - <span class="fw-bold">{{ $type_equipement ?? "" }}</span> - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="[
        'Sites'=> route('admin.sites.index'),
        ''.$site->name.'' => route('admin.sites.show',$site),
        'Equipements'=> '',
        ''.$type_equipement.'' => '',
        ]"/>


    <div class="row">
        @forelse ($equipements as $equipement)
            <x-gmao.equipement :equipement="$equipement"/>
        @empty
            <h3 class="mt-5 text-center">Aucun equipement de ce type</h3>
        @endforelse
    </div>




</x-gmao-layout>


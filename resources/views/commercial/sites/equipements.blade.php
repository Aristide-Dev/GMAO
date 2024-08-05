<x-gmao-layout>

    <x-slot name="title">{{ __('Site') }} - <span class="fw-bold">{{ $type_equipement ?? "" }}</span> - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="title_desc">{{ __('Site') }} - <span class="fw-bold">{{ $type_equipement ?? "" }}</span> - {{ __('Liste des Equipements') }}</x-slot>
    <x-slot name="sidebar">commercial</x-slot>


    <div class="row">
        @forelse ($equipements as $equipement)
            <x-gmao.equipement :equipement="$equipement"/>
        @empty
            <h3 class="mt-5 text-center">Aucun equipement de ce type</h3>
        @endforelse
    </div>



</x-gmao-layout>


<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['utilisateurs'=> '']"/>




    <div class="mt-3 col-12">
        <div class="mb-4 col-4">
            <x-gmao.create-user/>
        </div>

        <livewire:users-table />
    </div>

</x-gmao-layout>


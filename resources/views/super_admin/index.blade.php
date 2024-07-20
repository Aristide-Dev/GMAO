<x-gmao-layout>
    <x-slot name="title">{{ __('Super Admin') }}</x-slot>
    <x-slot name="title_desc">{{ __('Super Admin') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Super Admin') }}
        </h2>
    </x-slot>


    @php
    $userImageIllustration = ["woman.jpg", "boy.jpg"];
    @endphp

    <div class="row">
        <div class="mb-4 col-md-12 h-72">
            <div class="bg-center bg-no-repeat bg-cover border shadow shadow-red-500 size-full" style="background-image: url('{{ Storage::url("assets/img/sog/".$userImageIllustration[rand(0,1)]) }}');">
                <div class="h-full mx-auto rounded-lg row">
                    <div class="mb-3 rounded-lg col-12 h-72">
                        <div class="pb-3 mb-3 card-body text-start ps-sm-0">
                            <!-- Contenu de la carte ici -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-3">
        <livewire:super-admin.change-demandes-status />
        <livewire:super-admin.sync-database />
    </div>
</x-gmao-layout>


<x-gmao-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title_desc">{{ __('Dashboard') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <!-- View sales -->
        <div class="mb-4 col-xl-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="mb-4 card-title">Content de vous revoir! 🎉</h5>
                            {{-- <p class="mb-2">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}</p> --}}
                            {{-- <h4 class="mb-1 text-primary">$48.9k</h4> --}}
                            <a href="javascript:;" class="mt-4 btn btn-primary">{{ Auth::user()?->first_name }} {{
                                Auth::user()?->last_name }}s</a>
                        </div>
                    </div>
                    <div class="text-center col-5 text-sm-left">
                        <div class="px-0 pb-0 card-body px-md-4">
                            @php
                            $userImageIllustration = ["card-advance-sale.png", "add-new-roles.png"];
                            @endphp
                            <img src="/storage/assets/img/illustrations/{{ $userImageIllustration[rand(0,1)] }}"
                                height="140" alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <livewire:stats-card />
        <!--/ Statistics -->
    </div>


    <div class="row">
        <div class="p-3 my-3 col-12">
            <livewire:evolution-requetes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:top-10-pannes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:requete-by-equipement-type />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:requete-by-zone />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            {{-- <livewire:cout-total-maintenance-by-site /> --}}
        </div>
    </div>
</x-gmao-layout>

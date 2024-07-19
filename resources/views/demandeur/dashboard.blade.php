<x-gmao-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title_desc">{{ __('Dashboard') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
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

    <div class="row">
        <!-- View sales -->
        <div class="mb-4 col-xl-4 col-lg-5 col-12">
          <div class="card bg-gradient-to-r from-blue-300 to-black">
              <div class="d-flex align-items-end row">
                  <div class="col-12">
                      <div class="card-body text-nowrap">
                          <h5 class="py-2 mb-4 font-bold text-white shadow-lg ps-2 card-title animate-pulse">Content de vous revoir! 🎉</h5>
                          {{-- <p class="mb-2">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}</p> --}}
                          {{-- <h4 class="mb-1 text-primary">$48.9k</h4> --}}
                          <div class="mt-4 font-bold text-white bg-yellow-400 shadow hover:text-white hover:bg-yellow-500 btn">
                              {{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <!-- View sales -->
    </div>
</x-gmao-layout>

<x-gmao-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title_desc">{{ __('Dashboard') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>
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
                  <h5 class="mb-0 card-title">Content de vous revoir! 🎉</h5>
                  <p class="mb-2">{{ fake()->name }}</p>
                  <h4 class="mb-1 text-primary">$48.9k</h4>
                  <a href="javascript:;" class="btn btn-primary">View Sales</a>
                </div>
              </div>
              <div class="text-center col-5 text-sm-left">
                <div class="px-0 pb-0 card-body px-md-4">
                    @php
                        $userImageIllustration = ["card-advance-sale.png", "add-new-roles.png"];
                    @endphp
                  <img src="/storage/assets/img/illustrations/{{ $userImageIllustration[rand(0,1)] }}" height="140" alt="view sales">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- View sales -->
      </div>
</x-gmao-layout>

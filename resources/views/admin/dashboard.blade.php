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
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-7">
                <div class="card-body text-nowrap">
                  <h5 class="card-title mb-4">Content de vous revoir! 🎉</h5>
                  {{-- <p class="mb-2">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}</p> --}}
                  {{-- <h4 class="text-primary mb-1">$48.9k</h4> --}}
                  <a href="javascript:;" class="btn btn-primary mt-4">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}s</a>
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
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

        <!-- Statistics -->
        <div class="col-xl-8 mb-4 col-lg-7 col-12">
          <div class="card h-100">
            <div class="card-header">
              <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0">Statistics</h5>
                <small class="text-muted">--------------------------------</small>
              </div>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                {{-- DEMANDES --}}
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                        {{-- <i class="ti ti-chart-pie-2 ti-sm"></i> --}}
                        <i class="menu-icon fa-solid fa-hand-holding-medical fa-md"></i>
                    </div>
                    <div class="card-info">
                      <h6 class="mb-0">230k</h6>
                      <small>Demandes</small>
                    </div>
                  </div>
                </div>
                {{-- DEMANDES --}}

                {{-- SITES --}}
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                        <i class="menu-icon fa-solid fa-screwdriver-wrench fa-md"></i>
                    </div>
                    <div class="card-info">
                      <h6 class="mb-0">
                        <span class="text-danger">8.549k</span> / 100
                    </h6>
                      <small>Sites (actifs)</small>
                    </div>
                  </div>
                </div>
                {{-- SITES --}}

                {{-- PRESTATAIRES --}}
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                        <i class="menu-icon fa-solid fa-users-gear fa-md"></i>
                    </div>
                    <div class="card-info">
                      <h6 class="mb-0">1.423k</h6>
                      <small>Prestataires</small>
                    </div>
                  </div>
                </div>
                {{-- PRESTATAIRES --}}

                {{-- UTILISATEURS --}}
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                        <i class="menu-icon fa-solid fa-user-tie fa-md"></i>
                    </div>
                    <div class="card-info">
                      <h6 class="mb-0">$9745</h6>
                      <small>Utilisateurs</small>
                    </div>
                  </div>
                </div>
                {{-- UTILISATEURS --}}

              </div>
            </div>
          </div>
        </div>
        <!--/ Statistics -->

        <div class="col-xl-4 col-12">
          <div class="row">
            <!-- Expenses -->
            {{-- <div class="col-xl-6 mb-4 col-md-3 col-6">
              <div class="card">
                <div class="card-header pb-0">
                  <h5 class="card-title mb-0">82.5k</h5>
                  <small class="text-muted">Expenses</small>
                </div>
                <div class="card-body">
                  <div id="expensesChart"></div>
                  <div class="mt-md-2 text-center mt-lg-3 mt-3">
                    <small class="text-muted mt-3">$21k Expenses more than last month</small>
                  </div>
                </div>
              </div>
            </div> --}}
            <!--/ Expenses -->

            <!-- Profit last month -->
            {{-- <div class="col-xl-6 mb-4 col-md-3 col-6">
              <div class="card">
                <div class="card-header pb-0">
                  <h5 class="card-title mb-0">Profit</h5>
                  <small class="text-muted">Last Month</small>
                </div>
                <div class="card-body">
                  <div id="profitLastMonth"></div>
                  <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                    <h4 class="mb-0">624k</h4>
                    <small class="text-success">+8.24%</small>
                  </div>
                </div>
              </div>
            </div> --}}
            <!--/ Profit last month -->

            <!-- Generated Leads -->
            <div class="col-xl-12 mb-4 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                      <div class="card-title mb-auto">
                        <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                        <small>Monthly Report</small>
                      </div>
                      <div class="chart-statistics">
                        <h3 class="card-title mb-1">4,350</h3>
                        <small class="text-success text-nowrap fw-medium"><i class='ti ti-chevron-up me-1'></i> 15.8%</small>
                      </div>
                    </div>
                    <div id="generatedLeadsChart"></div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Generated Leads -->
          </div>
        </div>

        <!-- Demande Stats -->
        <div class="col-12 col-xl-8 mb-4">
          <div class="card">
            <div class="card-body p-0">
              <div class="row row-bordered g-0">
                <div class="col-md-8 position-relative p-4">
                  <div class="card-header d-inline-block p-0 text-wrap position-absolute">
                    <h5 class="m-0 card-title">Demande Stats</h5>
                  </div>
                  <div id="totalRevenueChart" class="mt-n1"></div>
                </div>
                <div class="col-md-4 p-4">
                  <div class="text-center mt-4">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="budgetId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <script>
                        document.write(new Date().getFullYear())

                        </script>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                        <a class="dropdown-item prev-year1" href="javascript:void(0);">
                          <script>
                          document.write(new Date().getFullYear() - 1)

                          </script>
                        </a>
                        <a class="dropdown-item prev-year2" href="javascript:void(0);">
                          <script>
                          document.write(new Date().getFullYear() - 2)

                          </script>
                        </a>
                        <a class="dropdown-item prev-year3" href="javascript:void(0);">
                          <script>
                          document.write(new Date().getFullYear() - 3)

                          </script>
                        </a>
                      </div>
                    </div>
                  </div>
                  <h3 class="text-center pt-4 mb-0">$25,825</h3>
                  <p class="mb-4 text-center"><span class="fw-medium">Budget: </span>56,800</p>
                  <div class="px-3">
                    <div id="budgetChart"></div>
                  </div>
                  <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary">Increase Budget</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Demandes Stats -->
      </div>
</x-gmao-layout>

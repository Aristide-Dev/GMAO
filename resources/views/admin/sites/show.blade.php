<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur le Site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    <div class="row">
        <div class="mb-4 col-md-4 h-100">
            <div class="h-auto card">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="mt-3 d-flex align-items-end h-100 justify-content-center mt-sm-0">
                            <img src="/storage/assets/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-start ps-sm-0">
                            <x-gmao.add-equipement/>
                            <p class="mt-1 mb-0">Ajouter un equipement si il n'existe pas encore</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-gmao.type-equipements-list action='admin' />

    </div>

    <div class="p-3 row">
        @include('demandeur.sites.partials.statistiques')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

  </x-gmao-layout>



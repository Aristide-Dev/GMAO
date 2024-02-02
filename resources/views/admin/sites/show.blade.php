<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur le Site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>


    <div class="mb-3 row">
        <div class="col-md-4">
            <x-gmao.add-equipement/>
        </div>
    </div>
    
    <div class="row">
        <x-gmao.type-equipements-list action='admin'/>
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



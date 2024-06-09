<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur le Site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Sites'=> route('admin.sites.index'), ''.$site->name.'' => '']"/>

    <h2 class="fw-bold">{{ $site->name }}</h1>
        @php
            // dd($site->equipements)
        @endphp

    <div class="row">
        <div class="mb-4 col-md-4 h-100">
            <div class="h-100 card" style="background-image: url('{{ Storage::url("svg/station_service.svg") }}'); background-size:cover; background-position:center;">
                <div class="mx-auto bg-gray-950/60 row h-100">
                    <div class="mb-3 h-100 col-12">
                        <div class="pb-3 mb-3 card-body text-start ps-sm-0">
                            <x-gmao.add-equipement :site="$site"/>
                            <p class="mt-1 mb-0 font-bold text-white">Ajouter un equipement si il n'existe pas encore</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <x-gmao.type-equipements-list action='admin' :site="$site"/>

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



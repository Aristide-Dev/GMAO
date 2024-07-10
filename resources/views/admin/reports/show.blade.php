<x-gmao-layout>
    <x-slot name="title">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="title_desc">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Rapports Mensuels'=> route('admin.reports.index'), \Carbon\Carbon::createFromFormat('m', $monthlyReport->month)->format('F').' '.$monthlyReport->year=> '']"/>

    <div class="mx-2 row">
        <div class="flex items-center h-10 mx-0 bg-white rounded shadow-xl col-md-12">
            <h1 class="font-bold">RAPPORT MENSUEL: {{ \Carbon\Carbon::createFromFormat('m', $monthlyReport->month)->format('F').' '.$monthlyReport->year }}</h1>
        </div>
    </div>
</x-gmao-layout>


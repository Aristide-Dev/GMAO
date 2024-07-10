<x-gmao-layout>
    <x-slot name="title">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="title_desc">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Rapports Mensuels'=> route('admin.reports.index'), $monthlyReport->title => '']"/>

        <livewire:rapports.report-card :monthlyReport="$monthlyReport" />
</x-gmao-layout>

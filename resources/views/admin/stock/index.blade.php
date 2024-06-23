<x-gmao-layout>
    <x-slot name="title">{{ __('STOCK') }}</x-slot>
    <x-slot name="title_desc">{{ __('Administration du Stock') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Gestion du stock'=> '']"/>




    <div class="mt-3 col-12">
        <div class="mb-4 col-4">
            <x-gmao.create-piece />
        </div>
        <!-- Hoverable Table rows -->
        <livewire:pieces-table>
        <!--/ Hoverable Table rows -->
    </div>

</x-gmao-layout>




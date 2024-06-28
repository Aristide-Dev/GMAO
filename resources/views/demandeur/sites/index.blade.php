<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Sites') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <livewire:site-table action="demandeur" />
        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


<x-gmao-layout>
    <x-slot name="title">{{ __('Formations') }}</x-slot>
    <x-slot name="title_desc">{{ __('Formations') }}</x-slot>
    <x-breadcrumb :data="['Formations'=> '']"/>

        <div class="mt-3 col-12">
            <!-- Hoverable Table rows -->
            <div class="overflow-hidden card">
                <livewire:formations/>
    
    
            <!--/ Hoverable Table rows -->
        </div>
    </div>
</x-gmao-layout>
<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Sites') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Sites'=> '']"/>


    <div class="mt-3 col-12">
        <div class="col-4 mb-4">
            <x-gmao.create-site/>
        </div>

        <!-- Hoverable Table rows -->
        <livewire:site-table :errors="$errors"/>
        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


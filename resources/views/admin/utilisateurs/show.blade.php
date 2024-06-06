<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur l\'utilisateur') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="[
        'utilisateurs'=> route('admin.utilisateurs.index'),
        'Profile'=> '',
        ''.$utilisateur->first_name.' '.$utilisateur->last_name.'' => '',
        ]"/>



    <x-gmao.user-details/>

</x-gmao-layout>




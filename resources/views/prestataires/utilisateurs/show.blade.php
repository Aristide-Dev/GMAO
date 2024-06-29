<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur l\'utilisateur') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>



    <x-gmao.prestataire-user-details :utilisateur="$utilisateur" role="{{ (Auth::user()->role == 'prestataire_admin') ? 'gerant':'agent' }}"/>

</x-gmao-layout>




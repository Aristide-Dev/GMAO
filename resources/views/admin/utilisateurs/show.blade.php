<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur l\'utilisateur') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="[
        'utilisateurs'=> route('admin.utilisateurs.index'),
        'Profile'=> '',
        ''.$utilisateur->first_name.' '.$utilisateur->last_name.'' => '',
        ]"/>

<ul class="mb-3 nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
    </li>
  </ul>



    <x-gmao.user-details :utilisateur="$utilisateur"/>

</x-gmao-layout>




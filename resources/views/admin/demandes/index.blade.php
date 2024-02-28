<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="custum_styles">

        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    <script src="/storage/js/file_viewer.js">
        
    </script>


<!-- La modale -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>



    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <x-gmao.create-demande action="admin" :sites="$sites" :demandeurs="$demandeurs"/>
                </div>
                <div class="col-12">
                    <h5>Liste des demandes d'interventions</h5>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos demandes d'interventions</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Document</th>
                            <th class="text-left">Demandeur</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        
                        @forelse ($demandes as $key => $demande)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <span class="fw-bold">{{ $demande->di_reference }}</span>
                            </td>
                            <td class="text-left">
                                <a class="fw-bold" href="{{ route('admin.sites.show', $demande->site->id) }}">{{ $demande->site->name }}</a>
                            </td>
                            <td class="text-left">
                                <div class="avatar avatar-md me-2">
                                    <img src="{{ $demande->document() }}" alt="document" class="rounded-circle" id="doc_image_url{{ $key+1 }}" onclick="displayImageInModal('doc_image_url{{ $key+1 }}')">
                                </div>
                            </td>
                            <td class="justify-center align-items-center">
                                <ul class="list-unstyled m-0 d-flex justify-center text-center align-center avatar-group my-3">
                                    <li data-bs-toggle="tooltip" class="d-block" data-popup="tooltip-custom" data-bs-placement="right" title="{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}" class="avatar pull-up">
                                      <img class="rounded-circle w-25" src="/storage/assets/img/avatars/5.png" alt="photo">
                                      <p class="fw-bold">{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}</p>
                                    </li>
                                  </ul>
                            </td>
                            <td>
                                <span class="badge bg-{{ $demande->statutColor() }} me-1">{{ $demande->status }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.demandes.show', $demande) }}" class="btn btn-primary">Suivis</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <h3 class="text-center">Aucune demande</h3>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>D.I</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Document</th>
                            <th class="text-left">Demandeur</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


            @forelse ($demandes as $key => $demande)
            <div class="p-2 m-2 mb-4 border rounded-lg shadow card d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">{{ $demande->di_reference }}</h5>
                        <div class="card-title-elements ms-auto">
                            <button type="button" class="btn btn-icon btn-sm btn-danger">
                                <span class="tf-icon ti-xs ti ti-brand-shopee"></span>
                            </button>
                        </div>
                    </div>
                    <h6 class="card-title">
                        <a href="{{ route('admin.sites.show', $demande->site->id) }}">
                            <span class="h5">site</span>: <span class="text-muted">{{ $demande->site->name }}</span>
                        </a>
                    </h6>

                    <div class="mb-3 card-subtitle">
                        <span class="badge bg-label-{{ $demande->statutColor() }} me-1">{{ $demande->status }}</span>
                    </div>

                    <img class="mx-auto my-4 rounded img-fluid d-flex" src="{{ $demande->document() }}" alt="Docuement" id="doc_image_id_for_mobile{{ $key+1 }}" onclick="displayImageInModal('doc_image_id_for_mobile{{ $key+1 }}')"/>

                    <a href="{{ route('admin.demandes.show', $demande) }}" class="card-link btn btn-primary">Suivis</a>
                </div>
            </div>
            @empty
            <h3 class="text-center d-sm-block d-md-none d-lg-none d-xl-none">Aucune demande</h3>
            @endforelse


        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>


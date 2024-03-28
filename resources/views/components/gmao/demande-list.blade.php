@props(['action' => 'prestataires', "demandes"])
@php
    $url ="";
    if($action == 'admin')
    {
        $url = "admin";
    }else{
        $url = "prestataires";
    }
@endphp

<div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
    <table class="table table-hover">
        <caption class="ms-4">Liste des Demandes d'interventions (DI)</caption>
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
                    @if ($url == 'admin')
                        <a class="fw-bold" href="{{ route('admin.sites.show', $demande->site->id) }}">{{ $demande->site->name }}</a>
                    @else
                        <p class="fw-bold">{{ $demande->site->name }}</p>
                    @endif
                </td>
                <td class="text-left">
                    <div class="avatar avatar-md me-2">
                        <img src="{{ $demande->document() }}" alt="document" class="rounded-circle" id="doc_image_url{{ $key+1 }}" onclick="displayImageInModal('doc_image_url{{ $key+1 }}')">
                    </div>
                </td>
                <td class="justify-center align-items-center">
                    <ul class="justify-center m-0 my-3 text-center list-unstyled d-flex align-center avatar-group">
                        <li data-bs-toggle="tooltip" class="d-block" data-popup="tooltip-custom" data-bs-placement="right" title="{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}" class="avatar pull-up">
                          <img class="rounded-circle w-25" src="/storage/assets/img/avatars/5.png" alt="photo">
                          <p class="fw-bold">{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}</p>
                        </li>
                      </ul>
                </td>
                <td class="text-center">
                    <span class="text-center badge me-1 w-100 text-uppercase" style="background-color: {{ $demande->statutColor() }}">{{ $demande->status }}</span>
                </td>
                <td>
                    <a href="{{ route($url.'.demandes.show', $demande) }}" class="btn btn-primary">Suivis</a>
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
<nav aria-label="Page navigation" class="mx-3 d-flex">
    {{ $demandes->links() }}
</nav>


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
            
            @if ($url == 'admin')
            <a href="{{ route('admin.sites.show', $demande->site->id) }}">
                <span class="h5">site</span>: <span class="text-muted">{{ $demande->site->name }}</span>
            </a>
            @else
                <p class="fw-bold">{{ $demande->site->name }}</p>
            @endif
            
        </h6>

        <div class="mb-3 card-subtitle">
            <span class="badge me-1" style="background-color: {{ $demande->statutColor() }}">{{ $demande->status }}</span>
        </div>

        <img class="mx-auto my-4 rounded img-fluid d-flex" src="{{ $demande->document() }}" alt="Docuement" id="doc_image_id_for_mobile{{ $key+1 }}" onclick="displayImageInModal('doc_image_id_for_mobile{{ $key+1 }}')"/>

        <a href="{{ route($url.'.demandes.show', $demande) }}" class="card-link btn btn-primary">Suivis</a>
    </div>
</div>
@empty
<h3 class="text-center d-sm-block d-md-none d-lg-none d-xl-none">Aucune demande</h3>
@endforelse
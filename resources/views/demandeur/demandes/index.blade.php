<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>
    <x-slot name="custum_styles">
        
        @vite(['resources/css/file_viewer.css'])
    </x-slot>

    @php
    $statuts = [
    [
    'statut' => 'en attente de validation',
    'color' => 'warning',
    ],
    [
    'statut' => 'transmise au prestataire',
    'color' => 'primary',
    ],
    [
    'statut' => 'annulée',
    'color' => 'danger',
    ],
    [
    'statut' => 'rejettée',
    'color' => 'danger',
    ],
    ];
    @endphp


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
                    <x-gmao.create-demande :sites="$sites" />
                </div>
                <div class="col-12">
                    <h5>Vos demandes d'interventions</h5>
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
                            <th>Status</th>
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
                                <a href="{{ route('demandeur.sites.show', $demande->site->id) }}">{{ $demande->site->name }}</a>
                            </td>
                            <td class="text-left">
                                <div class="avatar avatar-md me-2">
                                    <img src="{{ $demande->document() }}" alt="document" class="rounded-circle" id="doc_image_url{{ $key+1 }}" onclick="displayImageInModal('doc_image_url{{ $key+1 }}')">
                                </div>
                            </td>
                            <td>
                                @php
                                $st = $statuts[rand(0,3)];
                                @endphp
                                <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
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
                            <th>Status</th>
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
                        <a href="{{ route('demandeur.sites.show', $demande->site->id) }}">
                            <span class="h5">site</span>: <span class="text-muted">{{ $demande->site->name }}</span>
                        </a>
                    </h6>
                    
                    <div class="mb-3 card-subtitle">
                        @php
                        $st = $statuts[rand(0,3)];
                        @endphp
                        <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                    </div>

                    <img class="mx-auto my-4 rounded img-fluid d-flex" src="{{ $demande->document() }}" alt="Docuement" id="doc_image_id_for_mobile{{ $key+1 }}" onclick="displayImageInModal('doc_image_id_for_mobile{{ $key+1 }}')"/>
                    
                    <a href="{{ route('demandeur.demandes.show', rand(1,5)) }}" class="card-link btn btn-primary">Details</a>
                </div>
            </div>
            @empty
            <h3 class="text-center">Aucune demande</h3>
            @endforelse



        <!--/ Hoverable Table rows -->
    </div>

    <script>
       // Obtenez l'élément de fermeture (X)
var span = document.getElementsByClassName("close")[0];

// Lorsque l'utilisateur clique sur (X), fermez la modale
span.onclick = function() {
  modal.style.display = "none";
}

// Fonction générique pour afficher une image en grand

// Fonction générique pour afficher une image en grand
function displayImageInModal(imageId) {
    var modal = document.getElementById("myModal"); // Déplacer la déclaration de modal ici
    var img = document.getElementById(imageId);
    var modalImg = document.getElementById("img01");

    // Ajoutez un événement de clic à l'image
    img.onclick = function(){
        modal.style.display = "block"; // Afficher la modale
        modalImg.src = this.src; // Mettre à jour l'image de la modale avec l'image cliquée
    }

    // Obtenez l'élément de fermeture (X)
    var span = document.getElementsByClassName("close")[0];

    // Lorsque l'utilisateur clique sur (X), fermez la modale
    span.onclick = function() {
        modal.style.display = "none";
    }
}



    </script>
</x-gmao-layout>


<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">{{ __('Demandes') }}</x-slot>
    <x-slot name="sidebar">demandeur</x-slot>

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
<style>
    /* Style de la modale */
.modal {
  display: none; /* Cachez la modale par défaut */
  position: absolute; /* Position fixe pour couvrir toute la page */
  z-index: 10000; /* Positionne la modale au-dessus du reste du contenu */
  padding-top: 100px; /* Espace au-dessus de la modale */
  left: 0;
  top: 0;
  width: 100%; /* Largeur de la modale */
  height: 100%; /* Hauteur de la modale */
  overflow: auto; /* Ajoutez un défilement si nécessaire */
  background-color: rgb(0,0,0); /* Couleur de fond de la modale */
  background-color: rgba(0,0,0,0.9); /* Couleur de fond avec transparence */
}

/* Style de l'image dans la modale */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Style de la fermeture (X) de la modale */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

</style>

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
                                <h1 class="text-center">Aucune demande</h1>
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


            @for ($i = 0; $i < 30; $i++) <div class="p-2 m-2 mb-4 border rounded-lg shadow card d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">DI0000{{ rand(1,200) }}</h5>
                        <div class="card-title-elements ms-auto">
                            <button type="button" class="btn btn-icon btn-sm btn-danger">
                                <span class="tf-icon ti-xs ti ti-brand-shopee"></span>
                            </button>
                        </div>
                    </div>
                    <h6 class="card-title"><span class="h5">site</span>: <span class="text-muted">{{ fake()->name
                            }}</span></h6>
                    <div class="mb-3 card-subtitle text-muted"><span class="h6">Equipement: </span>{{ fake()->name }}
                    </div>
                    <div class="mb-3 card-subtitle">
                        @php
                        $st = $statuts[rand(0,3)];
                        @endphp
                        <span class="badge bg-label-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span>
                    </div>

                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="{{ route('demandeur.demandes.show', rand(1,5)) }}" class="card-link btn btn-primary">Details</a>
                </div>
        </div>
        @endfor


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


@props(['action' => 'demandeur','sites','demandeurs'])

@if (!isset($sites))
@php
throw new InvalidArgumentException('Le composant (add-demande) nécessite une prop "sites"');
@endphp
@endif

<button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddDemande" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span class="d-none d-sm-inline-block">Nouvelle Demande</span>
    <span class="d-md-none">Créer</span>
</button>
@php
$show = "";
$routeName = "";
if($action == "demandeur")
{
$routeName = "demandeur.demandes.store";
}elseif($action == "admin")
{
$routeName = "demandeur.demandes.store";
}
@endphp

@if ($errors->hasBag('create_demande_intervention'))
@php
$show = "show";
@endphp
@endif


<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="offcanvasAddDemande" aria-labelledby="offcanvasAddDemandeLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddDemandeLabel" class="offcanvas-title">Nouvelle demande d'intervention</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" enctype="multipart/form-data" method="POST" action="{{ route($routeName) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="site">site</label>
                <select id="site" name="site" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--CHOISIR--">
                    <option value="">--CHOISIR--</option>
                    @foreach ($sites as $site)
                    <option value="{{ $site->id }}">{{ $site->name }}</option>
                    @endforeach
                </select>
                <x-input-error bag="create_demande_intervention" for="site" class="mt-2" />
            </div>

            @if($action == "admin")

            @if (!isset($demandeurs))
            @php
            throw new InvalidArgumentException('Le composant (add-demande) nécessite une prop "demandeurs"');
            @endphp
            @endif
            <div class="mb-3">
                <label class="h6" for="demandeur">Selectionner le demandeur</label>
                <select id="demandeur" name="demandeur" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- CHOISIR UN DEMANDEUR ---">
                    <option value="">--CHOISIR--</option>
                    @foreach ($demandeurs as $demandeur)
                    <option value="{{ $demandeur->id }}">{{ $demandeur->first_name }} {{ $demandeur->last_name }}</option>
                    @endforeach
                </select>
                <x-input-error bag="create_demande_intervention" for="demandeur" class="mt-2" />
            </div>
            @endif






            <script type="text/javascript">
                "use strict";

                function get_e_template() {
                    return `<div class="dz-preview dz-file-preview">
                        <div class="dz-details">
                            <div class="dz-thumbnail">
                                <img data-dz-thumbnail>
                                <span class="dz-nopreview">Aucun fichier</span>
                                <div class="dz-success-mark"></div>
                                <div class="dz-error-mark"></div>
                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                </div>
                            </div>
                            <div class="dz-filename" data-dz-name></div>
                            <div class="dz-size" data-dz-size></div>
                        </div>
                    </div>`;
                }


                $(document).ready(function() {
                    var create_demande_drop_zone = document.getElementById("dropzone-create-demande");

                    if (create_demande_drop_zone) {
                        // Initialise Dropzone pour la zone de dépôt de fichiers basic
                        var dropzoneCreateDemande = new Dropzone("#dropzone-create-demande", {
                            previewTemplate: get_e_template(), // Modèle de prévisualisation des fichiers
                            parallelUploads: 1, // Nombre de fichiers à télécharger simultanément
                            maxFilesize: 2, // Taille maximale des fichiers en Mo
                            addRemoveLinks: true, // Afficher les liens de suppression des fichiers,
                            maxFiles: 1, // Nombre maximum de fichiers pouvant être téléchargés
                            init: function() {
                                this.on("success", function(file) {
                                    // Supprimer l'élément input de type hidden
                                    $('#photo_demande_intervention').remove();
                                    // Créer un nouvel élément input de type file avec le nom du fichier téléchargé
                                    $('<input>').attr({
                                        type: 'file'
                                        , id: 'photo_demande_intervention'
                                        , name: 'photo_demande_intervention'
                                        , value: file
                                    }).appendTo('.fallback');
                                });
                            }
                        });
                    }
                });

            </script>





            <div action="null" class="mb-3 dropzone needsclick" id="dropzone-create-demande">
                <div class="dz-message needsclick">
                    Déplacez le fichier ici ou cliquez pour télécharger.
                </div>
                <div class="fallback">
                    <input id="photo_demande_intervention" name="photo_demande_intervention" type="hidden" />
                </div>
            </div>
            {{-- <input id="photo_demande_intervention" name="photo_demande_intervention" type="hidden" /> --}}

            <x-input-error bag="create_demande_intervention" for="photo_demande_intervention" class="mt-2" />

            <div class="mt-3 w-100 justify-content-between d-inline-flex">
                <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
                <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            </div>

        </form>





    </div>
</div>


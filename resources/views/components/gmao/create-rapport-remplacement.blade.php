@props(['demande', 'bonTravail'])
@php
    $rapport_id ="rapport-remplacement-offcanvas";
    $show = "";
@endphp

@if ($errors->hasBag('create_rapport_remplacement_piece'))
    @php
        $show = "show";
    @endphp
@endif

<style>
    .gmao_file_loder {
        border: 2px dashed #ccc;
        padding: 20px;
    }

    .gmao_file_loder.dragover {
        border-color: #666;
    }

    .gmao_file_loder-inner {
        position: relative;
    }

    .gmao_file_loder-text {
        display: block;
    }

    .preview {
        margin-top: 20px;
    }

    .preview img {
        max-width: 100%;
        max-height: 100%;
    }

    .preview-image {
        width: 100%;
        max-width: 100%;
        /* Spécifiez la largeur maximale souhaitée */
        max-height: 50%;
        /* Spécifiez la hauteur maximale souhaitée */
        margin: 10px;
        /* Ajoutez une marge entre les images */
    }


    #file-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        min-width: 100%;
        height: 50%;
        opacity: 0;
        cursor: pointer;
    }
</style>


<button class="add-new btn btn-warning waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $rapport_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>RAPPORT DE REMPLACEMENT</span>
</button>
<!-- Offcanvas to add new demande -->
<div class="offcanvas offcanvas-end bg-warning {{ $show }}" tabindex="-1" id="{{ $rapport_id }}" aria-labelledby="{{ $rapport_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $rapport_id }}Label" class="p-1 mx-2 text-black rounded text-uppercase bg-label-warning">Rapport de Remplacement</h6>
        <button type="button" class="text-white btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-demande" id="addNewDemandeForm" enctype="multipart/form-data" method="POST" action="{{ route('prestataires.demandes.rapport_remplacement.store', ['demande' => $demande,'bonTravail' => $bonTravail]) }}">
            @csrf

            <div class="mb-3">
                <div id="gmao_file_loder_contennaire" class="shadow">
                    <label class="text-white h6" for="file-input">RAPPORT</label>
                    <label class="bg-white gmao_file_loder">
                        <div class="gmao_file_loder-inner">
                            <span class="gmao_file_loder-text">Déposez le rapport ici ou cliquez pour le télécharger</span>
                            <input id="file-input" name="rapport_remplacement_piece_file" type="file"
                                accept=".jpeg,.jpg,.png" />
                        </div>
                        <div id="preview" class="p-2 preview"></div>
                    </label>
                </div>
                <x-input-error bag="create_rapport_remplacement_piece" for="rapport_remplacement_piece_file" class="mt-2" />
            </div>


            <div class="mb-3">
                <label class="text-white h6" for="autosize-demo">Ajouter un Commentaire ( <small class="text-mute text-light">pas obligatoire</small> )</label>
                <textarea id="autosize-demo" name="commentaire" rows="3" class="form-control" placeholder="Commentaire"></textarea>
                <x-input-error bag="create_rapport_remplacement_piece" for="commentaire" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">ENREGISTRER</button>
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Annuler</button>
        </form>
    </div>
</div>

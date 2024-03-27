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
                <div id="gmao_file_loder_contennaire_for_rr" class="shadow">
                    <label class="text-white h6" for="file-input">RAPPORT</label>
                    <label class="bg-white gmao_file_loder">
                        <div class="gmao_file_loder-inner">
                            <span class="gmao_file_loder-text">Déposez le rapport ici ou cliquez pour le télécharger</span>
                            <input id="file-input" name="rapport_remplacement_piece_file" type="file"
                                accept=".jpeg,.jpg,.png" />
                        </div>
                        <div id="preview_for_rr" class="p-2 preview"></div>
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

<script>
    function gmao_file_loder(dropzoneId, targetId, allowedTypes) {
        var gmao_file_loder_dropzone_ = document.getElementById(dropzoneId);
        var preview = document.getElementById(targetId);

        gmao_file_loder_dropzone_.addEventListener('dragover', function(e) {
            e.preventDefault();
            gmao_file_loder_dropzone_.classList.add('dragover');
        });

        gmao_file_loder_dropzone_.addEventListener('dragleave', function() {
            gmao_file_loder_dropzone_.classList.remove('dragover');
        });

        gmao_file_loder_dropzone_.addEventListener('drop', function(e) {
            e.preventDefault();
            gmao_file_loder_dropzone_.classList.remove('dragover');
            var files = e.dataTransfer.files;
            handleFiles(files);
        });

        var input = gmao_file_loder_dropzone_.querySelector('input[type="file"]');
        input.addEventListener('change', function() {
            var files = this.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            // Remove the initial text when files are added
            document.querySelector('.gmao_file_loder-text').style.display = 'none';

            preview.innerHTML = ''; // Clear previous previews
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var fileExtension = file.name.split('.').pop().toLowerCase(); // Get the file extension

                if (allowedTypes.includes(fileExtension)) {
                    var fileName = file.name; // Get the file name
                    var fileNameWithExtension = fileName.substr(0, fileName.lastIndexOf('.')) ||
                    fileName; // Get the file name with extension

                    var fileDescription = document.createElement('span');
                    fileDescription.textContent = fileNameWithExtension + ' (' + fileExtension + ')';
                    fileDescription.style.display = 'block'; // Make the file description a block element
                    fileDescription.style.marginTop = '5px'; // Add margin at the top

                    if (fileExtension === 'jpeg' || fileExtension === 'jpg' || fileExtension === 'png') {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = new Image();
                            img.classList.add('preview-image'); // Add class to the image
                            img.src = e.target.result;
                            img.width = 300;
                            img.height = 150;
                            preview.appendChild(img);
                            preview.appendChild(fileDescription); // Append the file description
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Display a default icon for non-image files
                        var icon = document.createElement('i');
                        icon.className = 'fa-solid fa-file fa-sm';
                        icon.style.color = '#97999b';
                        preview.appendChild(icon);
                        preview.appendChild(fileDescription); // Append the file description
                    }
                } else {
                    // Display message for not allowed file types
                    var message = document.createElement('span');
                    message.textContent = 'Extension non autorisée: ' + fileExtension.toUpperCase();
                    message.style.color = 'red'; // Set color to red for visibility
                    preview.appendChild(message);
                }
            }
        }




    }

    gmao_file_loder('gmao_file_loder_contennaire_for_rr', 'preview_for_rr', ['jpg', 'jpeg', 'png'])
</script>
<div>
    <div class="card-header row">
        <div class="mb-3 col-12">
            <button class="add-new btn btn-primary waves-effect waves-light" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasAddFormation" align="right">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Nouvelle Formation</span>
                <span class="d-md-none">Créer</span>
            </button>
        </div>
        <div class="col-12">
            <h5>Liste des Formations</h5>
            @foreach($formations as $formation)
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $formation->title }}</h3>
                        <p class="card-text">{{ $formation->description }}</p>
                        <a href="{{ route('formations.viewPdf', $formation) }}" class="btn btn-primary" target="_blank">Voir le PDF</a>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>




















    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddFormation"
    aria-labelledby="offcanvasAddFormationLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddFormationLabel" class="offcanvas-title">Nouvelle demande d'intervention</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form wire:submit='store' class="pt-0 add-new-formation" id="addNewFormationForm" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la formation</label>
                <input type="text" wire:model="title" name="title" class="form-control" required>
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea wire:model="description" name="description" class="form-control" rows="3" required></textarea>
            </div>
        
            <div id="gmao_file_loder_contennaire">
                <label class="gmao_file_loder">
                    <div class="gmao_file_loder-inner">
                        <span class="gmao_file_loder-text">Déposez le fichier PDF ici ou cliquez pour télécharger</span>
                        <input wire:model="pdf_file" id="file-input" name="pdf_file" type="file" accept=".pdf" />
                    </div>
                    <div id="preview" class="p-2 preview"></div>
                </label>
            </div>
        
            <div class="mt-3 w-100 justify-content-between d-inline-flex">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="offcanvas">Annuler</button>
                <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">Enregistrer</button>
            </div>
        </form>
        





    </div>
</div>

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
<script>
    function gmao_file_loder(dropzoneId, targetId, allowedTypes) {
        var gmao_file_loder_dropzone = document.getElementById(dropzoneId);
        var preview = document.getElementById(targetId);

        gmao_file_loder_dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            gmao_file_loder_dropzone.classList.add('dragover');
        });

        gmao_file_loder_dropzone.addEventListener('dragleave', function() {
            gmao_file_loder_dropzone.classList.remove('dragover');
        });

        gmao_file_loder_dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            gmao_file_loder_dropzone.classList.remove('dragover');
            var files = e.dataTransfer.files;
            handleFiles(files);
        });

        var input = gmao_file_loder_dropzone.querySelector('input[type="file"]');
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
                    var message = document.createElement('span');
                    message.textContent = 'Extension non autorisée: ' + fileExtension.toUpperCase();
                    message.style.color = 'red';
                    preview.appendChild(message);
                }
            }
        }




    }

    gmao_file_loder('gmao_file_loder_contennaire', 'preview', ['pdf'])
</script>
</div>

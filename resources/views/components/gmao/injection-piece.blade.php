@props(['pieces','rapport_intervention', 'btn'=> true])
@php
$rapport_id ="injection-piece-offcanvas";
$show = "";
@endphp

@if ($errors->hasBag('create_injection_piece'))
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


@if ($btn == true)
<button class="add-new btn btn-warning waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#{{ $rapport_id }}" align="right">
    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
    <span>INJECTION DE PIECE</span>
</button>
@endif
<!-- Offcanvas to add new piece -->
<div class="offcanvas offcanvas-end {{ $show }}" tabindex="-1" id="{{ $rapport_id }}" aria-labelledby="{{ $rapport_id }}Label">
    <div class="offcanvas-header">
        <h6 id="{{ $rapport_id }}Label" class="p-2 mx-3 rounded bg-label-danger text-uppercase">INJECTION DE PIECE</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="flex-grow-0 pt-0 mx-0 offcanvas-body h-100">
        <form class="pt-0 add-new-piece" id="addNewpieceForm" enctype="multipart/form-data" method="POST" action="{{route('admin.demandes.injection', $rapport_intervention)}}">
            @csrf
            <div class="mb-3">
                <label class="m-0 h6" for="piece">Pieces</label>
                <select id="piece" name="piece" class="select2 form-select form-select-lg" data-allow-clear="true" data-placeholder="--- CHOISIR ---" onchange="updatePrixPiece()">
                    <option value="">--- CHOISIR ---</option>
                    <!-- Boucle pour générer les options de pièces -->
                    @foreach ($pieces as $piece)
                        <option value="{{ $piece->id }}" data-prix="{{ $piece->price }}"  {{ old('piece') == $piece->id ? 'selected' : '' }}>{{ $piece->piece }}</option>
                    @endforeach
                </select>
                <x-input-error bag="create_injection_piece" for="piece" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="prix_de_la_piece_dans_le_stock" class="m-0 form-label">prix_de_la_piece_dans_le_stock</label>
                <input type="text" id="prix_de_la_piece_dans_le_stock" name="prix_de_la_piece_dans_le_stock" value="{{ old('prix_de_la_piece_dans_le_stock') }}" class="form-control" disabled />
                <x-input-error bag="create_injection_piece" for="prix_de_la_piece_dans_le_stock" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="quantite" class="m-0 form-label">quantite</label>
                <input type="number" id="quantite" name="quantite" value="{{ old('quantite',0) }}" class="form-control"/>
                <x-input-error bag="create_injection_piece" for="quantite" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="m-0 h6" for="pris_dans_le_stock">Pris dans le stock ?</label>
                <br>
                <label class="switch switch-primary">
                    <input name="pris_dans_le_stock" id="pris_dans_le_stock" type="checkbox" class="switch-input" {{ old('pris_dans_le_stock', 'checked') == 'on' ? 'checked' : '' }}/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on">
                            <i class="ti ti-check"></i>
                        </span>
                        <span class="switch-off">
                            <i class="ti ti-x"></i>
                        </span>
                    </span>
                    <span class="switch-label">Oui</span>
                </label>
                <x-input-error bag="create_injection_piece" for="pris_dans_le_stock" class="mt-2" />
            </div>

            <div class="p-2 mb-3 bg-label-secondary" id="fournisseur_block">
                <div class="mb-2" id="m-0 nom_du_fournisseur_block">
                    <label for="nom_du_fournisseur" class="form-label fw-bolder">nom_du_fournisseur</label>
                    <input type="text" id="nom_du_fournisseur" name="nom_du_fournisseur" placeholder="Nom du Fournisseur" class="form-control" />
                    <x-input-error bag="create_injection_piece" for="nom_du_fournisseur" class="mt-2"/>
                </div>

                <div class="mb-2" id="prix_du_fournissseur_block">
                    <label for="prix_du_fournissseur" class="m-0 form-label fw-bolder">prix_du_fournissseur</label>
                    <input type="number" id="prix_du_fournissseur" name="prix_du_fournissseur" placeholder="Prix de la piece chez le fournisseur" class="form-control" />
                    <x-input-error bag="create_injection_piece" for="prix_du_fournissseur" class="mt-2"/>
                </div>
            </div>

            <div class="mb-4">
                <label class="m-0 h6 text-uppercase" for="file-input">DOCUMENT</label>
                <div id="gmao_file_loder_injection_file_contennaire">
                    <label class="gmao_file_loder" style="background-color: #ffffff">
                        <div class="gmao_file_loder-inner">
                            <span class="gmao_file_loder-text">Déposez le document ici ou cliquez pour le télécharger</span>
                            <input id="file-input" name="injection_file_file" type="file" accept=".jpeg,.jpg,.png" />
                        </div>
                        <div id="preview" class="p-2 preview"></div>
                    </label>
                </div>
                <x-input-error bag="create_injection_piece" for="injection_file_file" class="mt-2" />
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

    gmao_file_loder('gmao_file_loder_injection_file_contennaire', 'preview', ['jpg', 'jpeg', 'png'])

</script>

<script>
    // Fonction appelée lorsqu'une pièce est sélectionnée dans la liste déroulante
    function updatePrixPiece() {
        // Sélectionne l'élément de la liste déroulante des pièces
        var pieceSelect = document.getElementById('piece');
        // Sélectionne l'option sélectionnée
        var selectedOption = pieceSelect.options[pieceSelect.selectedIndex];

        // Vérifie si une option est sélectionnée
        if (selectedOption) {
            // Récupère le prix de la pièce de l'attribut "data-prix"
            var prix = selectedOption.getAttribute('data-prix');

            // Sélectionne l'élément du champ prix_de_la_piece_dans_le_stock
            var prixField = document.getElementById('prix_de_la_piece_dans_le_stock');

            if(prix == null)
            {
                prixField.value = ' N/A';
            }else{
                // Met à jour la valeur du champ avec le prix de la pièce
                prixField.value = prix + ' F';
            }
        } else {
            // Si aucune option n'est sélectionnée, affiche "N/A"
            document.getElementById('prix_de_la_piece_dans_le_stock').value = 'N/A';
        }
    }


    // Fonction pour afficher ou masquer les champs en fonction de la sélection
    function toggleFields() {
        var prisDansLeStock = document.getElementById('pris_dans_le_stock');
        var fournisseur_block = document.getElementById('fournisseur_block');
        var nomFournisseur = document.getElementById('nom_du_fournisseur_block');
        var prixFournisseur = document.getElementById('prix_du_fournissseur_block');
        var stockPrice = document.getElementById('prix_de_la_piece_dans_le_stock');

        // Si la pièce est prise dans le stock, affiche le prix du stock et masque le nom du fournisseur et le prix du fournisseur
        if (prisDansLeStock.checked) {
            fournisseur_block.style.display = 'none';
            // nomFournisseur.style.display = 'none';
            // prixFournisseur.style.display = 'none';
            // stockPrice.style.display = 'block';
        } else { // Sinon, affiche le nom du fournisseur et le prix du fournisseur et masque le prix du stock
            fournisseur_block.style.display = 'block';
            // nomFournisseur.style.display = 'block';
            // prixFournisseur.style.display = 'block';
            // stockPrice.style.display = 'none';
        }
    }

    // Écoute les changements dans la case à cocher "pris_dans_le_stock"
    document.getElementById('pris_dans_le_stock').addEventListener('change', toggleFields);

    // Appelle la fonction une fois au chargement de la page pour initialiser les champs
    toggleFields();

</script>


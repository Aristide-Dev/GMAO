$(document).ready(function() {

    // Obtenez l'élément de fermeture (X)
    // var span = document.getElementsByClassName("close")[0];

    // // Lorsque l'utilisateur clique sur (X), fermez la modale
    // span.onclick = function () {
    //     modal.style.display = "none";
    // };

    // Fonction générique pour afficher une image en grand

    

    // Initialisation des images avec des événements de clic
    var images = document.querySelectorAll('.image-to-display'); // Remplacez avec la classe ou l'identifiant de vos images
    images.forEach((img, index) => {
        displayImageInModal(img.id); // Assurez-vous que chaque image a un id unique
    });

});


// Fonction générique pour afficher une image en grand
// Set up modal functionality
function displayImageInModal(imageId, modalId = 'myModal') {
    var modal = document.getElementById(modalId); 
    var img = document.getElementById(imageId);
    var modalImg = modal.querySelector(".modal-content");
    var captionText = modal.querySelector("#caption");

    // Ajoutez un événement de clic à l'image
    img.addEventListener('click', function() {
        modalImg.src = this.src; // Mettre à jour l'image de la modale avec l'image cliquée
        captionText.innerHTML = this.alt; // Mettre à jour la légende avec l'attribut alt de l'image cliquée
        modal.style.display = "block"; // Afficher la modale
    });

    var span = modal.querySelector(".close");
    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}
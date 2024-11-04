document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector(".carrousel_prev");
    const nextButton = document.querySelector(".carrousel_next");
    let images = Array.from(document.querySelectorAll(".carrousel_img"));
    const miniatures = document.querySelectorAll(".image_miniature img");
    const carrousel = document.querySelector(".carrousel");
    const galerieInitiale = document.querySelector(".galerie_initiale");
    let indexActuelle = 0;

    // Fonction pour afficher l'image active dans le carrousel
    function afficherImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle("active", i === index);
        });
    }

    // // Fonction pour cloner les images de la galerie initiale
    // function cloneImages() {
    //     const initialImages = Array.from(galerieInitiale.querySelectorAll('.image_miniature'));
    //     const galerieWidth = galerieInitiale.offsetWidth;
    //     const totalImagesWidth = initialImages.reduce((total, image) => total + image.offsetWidth, 0);
    //     const timesToClone = Math.ceil(galerieWidth / totalImagesWidth);

    //     // Supprime les clones existants
    //     const clones = galerieInitiale.querySelectorAll('.image_miniature.clone');
    //     clones.forEach(clone => clone.remove());

    //     // Clone les images pour remplir la largeur de l'écran
    //     for (let i = 0; i < timesToClone; i++) {
    //         initialImages.forEach((image, index) => {
    //             const clone = image.cloneNode(true);
    //             clone.classList.add('clone');
    //             galerieInitiale.appendChild(clone);

    //             // Ajoute un écouteur d'événement pour les images clonées
    //             clone.addEventListener("click", () => {
    //                 indexActuelle = index % initialImages.length;
    //                 afficherImage(indexActuelle);
    //                 carrousel.classList.remove("hidden");
    //                 galerieInitiale.classList.add("hidden");
    //             });
    //         });
    //     }
    // }

    // Clone les images pour créer un effet de boucle infini
    cloneImages();

    // Ajoute un écouteur d'événement pour le redimensionnement de la fenêtre
    window.addEventListener('resize', cloneImages);

    // Quand on clique sur une image miniature de la galerie initiale, on affiche le carrousel et on masque la galerie initiale
    miniatures.forEach((miniature, index) => {
        miniature.addEventListener("click", () => {
            indexActuelle = index; 
            afficherImage(indexActuelle);
            carrousel.classList.remove("hidden"); 
            galerieInitiale.classList.add("hidden"); 
        });
    });

    // Bouton précédent pour retourner à l'image précédente
    prevButton.addEventListener("click", () => {
        indexActuelle = (indexActuelle - 1 + images.length) % images.length;
        afficherImage(indexActuelle);
    });

    // Bouton suivant pour passer à l'image suivante
    nextButton.addEventListener("click", () => {
        indexActuelle = (indexActuelle + 1) % images.length;
        afficherImage(indexActuelle);
    });

    // Clic à l'extérieur du carrousel pour revenir à la galerie initiale
    document.addEventListener("click", (event) => {
        if (!carrousel.contains(event.target) && !galerieInitiale.contains(event.target)) {
            carrousel.classList.add("hidden");
            galerieInitiale.classList.remove("hidden");
        }
    });

    // Initialisation avec la première image active
    afficherImage(indexActuelle);
});
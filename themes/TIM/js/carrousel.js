document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector(".carrousel_prev");
    const nextButton = document.querySelector(".carrousel_next");
    const images = document.querySelectorAll(".carrousel_img");
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

    // Quand on clique sur une image miniature de la galerie initial on affiche le carrousel et on masque la galerie initiale
    miniatures.forEach((miniature, index) => {
        miniature.addEventListener("click", () => {
            indexActuelle = index; 
            afficherImage(indexActuelle);
            // jai utiliser hidden pour donner une animation mais si jamais c'est possible de changer pour display none
            carrousel.classList.remove("hidden"); 
            galerieInitiale.classList.add("hidden"); 
        });
    });

    // Bouton precedent pour retourner a limage precedente
    prevButton.addEventListener("click", () => {
        indexActuelle = (indexActuelle - 1 + images.length) % images.length;
        afficherImage(indexActuelle);
    });

    // Bouton suivant pour passer a limage suivante
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
});

document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector(".carrousel_prev");
    const nextButton = document.querySelector(".carrousel_next");
    const toggleButton = document.querySelector(".toggle_galerie");
    const carrouselImages = document.querySelector(".carrousel_images");
    const bouttonGallerie = document.querySelector(".boutton_gallerie");
    const images = document.querySelectorAll(".carrousel_img");
    let indexActuelle = 0;

    function afficherImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle("active", i === index);
        });
        console.log("indexActuelle: " + index); // Ajoutez ce message de débogage
    }

    prevButton.addEventListener("click", () => {
        indexActuelle = (indexActuelle - 1 + images.length) % images.length;
        afficherImage(indexActuelle);
        console.log("indexActuelle après clic sur prev: " + indexActuelle); // Ajoutez ce message de débogage
    });

    nextButton.addEventListener("click", () => {
        indexActuelle = (indexActuelle + 1) % images.length;
        afficherImage(indexActuelle);
        console.log("indexActuelle après clic sur next: " + indexActuelle); // Ajoutez ce message de débogage
    });

    toggleButton.addEventListener("click", () => {
        carrouselImages.classList.toggle("hidden");
        bouttonGallerie.classList.toggle("hidden");
    });

    afficherImage(indexActuelle); // Initialisation de l'image active
});

document.addEventListener("DOMContentLoaded", function () {
  const carrousel = document.querySelector(".carrousel");
  const carrouselFigure = carrousel.querySelector(".carrousel_figure");
  const prevButton = carrousel.querySelector(".carrousel_prev");
  const nextButton = carrousel.querySelector(".carrousel_next");
  const galleryImages = document.querySelectorAll(".wp-block-image img");
  let currentIndex = 0;

  // Fonction pour afficher le carrousel avec l'image sélectionnée
  function showCarrousel(index) {
    carrouselFigure.innerHTML = `<img src="${
      galleryImages[index].src
    }" alt="Image ${index + 1}">`;
    carrousel.style.display = "flex"; // Montre le carrousel
    currentIndex = index;
  }

  // Écouteur d'événement pour les images de la galerie
  galleryImages.forEach((img, index) => {
    img.addEventListener("click", () => {
      showCarrousel(index);
    });
  });

  // Écouteur d'événement pour le bouton suivant
  nextButton.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % galleryImages.length;
    showCarrousel(currentIndex);
  });

  // Écouteur d'événement pour le bouton précédent
  prevButton.addEventListener("click", () => {
    currentIndex =
      (currentIndex - 1 + galleryImages.length) % galleryImages.length;
    showCarrousel(currentIndex);
  });

  // Écouteur d'événement pour fermer le carrousel en cliquant à l'extérieur de l'image
  carrousel.addEventListener("click", (event) => {
    if (event.target === carrousel || event.target === carrouselFigure) {
      carrousel.style.display = "none"; // Ferme le carrousel
    }
  });
});


//Animation de la galerie
// Avec le CSS caroussel 
let images = document.querySelectorAll('.wp-block-image');
let tempsAnimation = images.length * 10;


// Fonction pour mettre à jour les styles d'animation
function updateAnimationStyles() {
  images.forEach((image, index) => {
    let largeurImage = image.getBoundingClientRect().width ; // Récupération dynamique de la largeur
    
    image.style.animationDelay = `calc(${tempsAnimation}s / ${images.length} * (${images.length} - ${index}) * -1)`;
    image.style.left = `max(calc(${largeurImage}px * ${images.length}), 100%)`;
    image.style.animationDuration = `${tempsAnimation}s`;
  });
}

// Observateur pour surveiller les changements de taille des images
const resizeObserver = new ResizeObserver(() => {
  updateAnimationStyles();
});

// Ajouter l'observateur à chaque image
images.forEach(image => resizeObserver.observe(image));

// Mise à jour initiale des styles
updateAnimationStyles();


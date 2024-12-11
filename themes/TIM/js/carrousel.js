// Fonction de carrousel sur la galerie
// /////////////////////////////////////////////

// Aller chercher les éléments ayant les classes suivantes
// Le document du contenu

//Code du carrousel - creation de la galerie d'images qui defile et qui s'agrandit

document.addEventListener("DOMContentLoaded", function () {
  const carrousel = document.querySelector(".carrousel");
  const carrouselFigure = document.querySelector(".carrousel_figure");
  // Les deux boutons pour changer d'image dans la galerie
  const prevButton = document.querySelector(".carrousel_prev");
  const nextButton = document.querySelector(".carrousel_next");
  // Galerie d'images
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

// LA SECTION ICI EST NON FONCTIONNEL ET À REVÉRIFIER POUR IMPLÉMENTER
// ////////////////////////////////////////////////////////////////////////

// // //pour faire scroll la galerie
// let images = document.querySelectorAll('.wp-block-image');
// let indexOrder = images.length;

// for(img of images) {
//   let indexTranslate = 0;
//   setInterval(() => {
//     //pour faire scroll la galerie
//     indexTranslate ++;
//     translationGalerie();
//   }, 20);

//   function translationGalerie() {
//     for(img of images) {
//       img.style.transform = `translateX(-${indexTranslate}%)`;
//     }
//   }
// }

// //API IntersectionObserver
// // Crée un nouvel observateur pour détecter l'intersection de l'image avec le viewport
// const observer = new IntersectionObserver((entries) => {
//   entries.forEach(entry => {

//     let remiseA0 = false;
//       if (!entry.isIntersecting) {
//         if(remiseA0 == false) {
//           remiseA0 = true;
//           //incrementer le indexorder pour que les images soit a la fin du
//           indexOrder ++;
//           //quand limage est en dehors du viewport
//           entry.target.style.order = indexOrder;
//           // entry.target.style.transform = 'translateX(0)';
//           observer.unobserve(entry.target);

//         }
//       } else {
//         //quand limage est dans le viewport
//         observer.observe(entry.target);
//       }
//   });
// }, {
//   root: null, // Utilise le viewport comme zone d'observation
//   threshold: 0 // Détecte quand l'image est complètement sortie
// });

// // Observer chaque image et les envoayer à l'observateur
// for(img of images) {
//     observer.observe(img);
// }

// /////// - FIN DU CODE À RÉGLER - ///////////////////////////
// //////////////////////////////////////////////////////////

//Animation de la galerie
// Avec le CSS caroussel
let images = document.querySelectorAll(".wp-block-image");
let tempsAnimation = images.length * 10;

// Fonction pour mettre à jour les styles d'animation
function updateAnimationStyles() {
  images.forEach((image, index) => {
    let largeurImage = image.getBoundingClientRect().width; // Récupération dynamique de la largeur

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
images.forEach((image) => resizeObserver.observe(image));

// Mise à jour initiale des styles
updateAnimationStyles();

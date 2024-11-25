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

// Avec le CSS caroussel 
let images = document.querySelectorAll('.wp-block-image');
for (let index = 0; index < images.length; index++) {
  images[index].style.animationDelay = "calc(50s / "+ images.length +" * ("+ images.length +" - " + index + ") * -1)";
  images[index].style.left =  "max(calc(10px * " + images.length + "), 100%)";
}

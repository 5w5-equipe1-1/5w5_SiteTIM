document.addEventListener('DOMContentLoaded', function() {
    const carrousel = document.querySelector('.carrousel');
    const carrouselFigure = carrousel.querySelector('.carrousel_figure');
    const prevButton = carrousel.querySelector('.carrousel_prev');
    const nextButton = carrousel.querySelector('.carrousel_next');
    const galleryImages = document.querySelectorAll('.wp-block-image img');
    let currentIndex = 0;

    // Fonction pour afficher le carrousel avec l'image sélectionnée
    function showCarrousel(index) {
        carrouselFigure.innerHTML = `<img src="${galleryImages[index].src}" alt="Image ${index + 1}">`;
        carrousel.style.display = 'flex'; // Montre le carrousel
        currentIndex = index;
    }

    // Écouteur d'événement pour les images de la galerie
    galleryImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            showCarrousel(index);
        });
    });

    // Écouteur d'événement pour le bouton suivant
    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        showCarrousel(currentIndex);
    });

    // Écouteur d'événement pour le bouton précédent
    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        showCarrousel(currentIndex);
    });

    // Écouteur d'événement pour fermer le carrousel en cliquant à l'extérieur de l'image
    carrousel.addEventListener('click', (event) => {
        if (event.target === carrousel || event.target === carrouselFigure) {
            carrousel.style.display = 'none'; // Ferme le carrousel
        }
    });
});


//pour faire scroll la galerie
const galerie = document.querySelector('.wp-block-gallery');
let images = document.querySelectorAll('.wp-block-image');
let indexTranslate = 0;
let indexImage = images.length;

setInterval(() => {
    indexTranslate --;
    scrollGallery();
    indexReset();
}, 10);

function scrollGallery() {
    for(img of images) {
        img.style.transform = 'translateX('+ indexTranslate +'%)';
    }
}

function indexReset() {
    for(img of images) {
        //si la position de limage est inferieur a 0px
        if(img.getBoundingClientRect().left < -300) {
            // mettre l'image a la fin de la galerie
            indexImage ++;
            img.style.order = indexImage;
            console.log(indexImage);
        }
    }
}


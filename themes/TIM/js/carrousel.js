document.addEventListener('DOMContentLoaded', function() {
    const carrousel = document.querySelector('.carrousel');
    const imagesContainer = carrousel.querySelector('.carrousel_images');
    let images = Array.from(carrousel.querySelectorAll('.image'));
    const prevButton = carrousel.querySelector('.carrousel_prev');
    const nextButton = carrousel.querySelector('.carrousel_next');
    let currentIndex = 0;
    let singleImageView = false; // Indique si une seule image est affichée

    // Fonction pour afficher toutes les images
    function showAllImages() {
        images.forEach(image => image.classList.remove('active'));
        singleImageView = false;
        carrousel.classList.remove('single-view');
    }

    // Fonction pour afficher une seule image
    function showImage(index) {
        images.forEach((image, i) => {
            image.classList.toggle('active', i === index);
        });
        currentIndex = index;
        singleImageView = true;
        carrousel.classList.add('single-view');
    }

    // Fonction pour cloner les images
    function cloneImages() {
        images.forEach(image => {
            const clone = image.cloneNode(true);
            imagesContainer.appendChild(clone);
        });
        images = Array.from(carrousel.querySelectorAll('.image'));
    }

    // Clone les images initialement
    cloneImages();

    // Utiliser IntersectionObserver pour cloner les images infiniment
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                cloneImages();
            }
        });
    });

    // Observer les dernières images pour cloner à nouveau
    images.slice(-2).forEach(image => observer.observe(image));

    // Affiche toutes les images au départ
    showAllImages();

    // Gère le clic sur une image pour passer à la suivante
    imagesContainer.addEventListener('click', function(event) {
        const image = event.target.closest('.image');
        if (image) {
            const index = images.indexOf(image);
            if (index !== -1) {
                currentIndex = (index + 1) % images.length; // Passe à l'image suivante
                showImage(currentIndex);
            }
        }
    });

    // Gestion des boutons de navigation
    prevButton.addEventListener('click', function(event) {
        event.stopPropagation();
        if (singleImageView) {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            showImage(currentIndex);
        }
    });

    nextButton.addEventListener('click', function(event) {
        event.stopPropagation();
        if (singleImageView) {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }
    });

    // Clic à l'extérieur de l'image active pour quitter la vue single
    document.addEventListener('click', function(event) {
        if (singleImageView && !event.target.closest('.image')) {
            showAllImages();
        }
    });
});

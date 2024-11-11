document.addEventListener('DOMContentLoaded', () => {
    const hiddenElements = document.querySelectorAll('.hidden');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                entry.target.classList.remove('reverse');
                console.log('show');
            } else {
                entry.target.classList.remove('show');
                entry.target.classList.add('reverse');
                console.log('reverse');
            }
        },
        {
            threshold: 0.9,
            rootMargin: '0px 0px -100px 0px'
        });
    });

    hiddenElements.forEach((el) => observer.observe(el));
});


// //Parallax
// let fenceGauche = document.querySelector('.fence-gauche');
// let fencedroite = document.querySelector('.fence-droite');

// window.addEventListener('scroll', () => {
//     let value = window.scrollY;

//     // Ajuste la translation pour donner un effet de mouvement
//     fenceGauche.style.transform = `translateX(${value * 0.4}px)`; 
//     fencedroite.style.transform = `translateX(${value * -0.4}px)`;
// });

//quand tu clique sur le cercle, tu scroll
document.addEventListener('DOMContentLoaded', () => {
    // Scroll in view
    let scrollElement = document.querySelector('.text_cercle');

    if (scrollElement) {
        scrollElement.addEventListener('click', () => {
            window.scrollTo({
                top: 800,
                behavior: 'smooth'
            });
            //l'element s’envole vers le haut
            scrollElement.style.transform = 'translatey(-1000px)';
            scrollElement.style.transition = "transform 0.5s ease";
        });
    }

    // Scroll animation 
    let scrollAnim = document.querySelector('.bannieres');

    if (scrollAnim) {
        window.addEventListener('scroll', () => {
            let value = window.scrollY;
            let elementTop = scrollAnim.getBoundingClientRect().top + window.scrollY;
            let windowHeight = window.innerHeight;

            // Calculer le pourcentage de défilement par rapport à la hauteur de la fenêtre
            let scrollPourcentage = ((value + windowHeight - elementTop) / windowHeight) * 100;

            // Limiter le pourcentage de défilement entre 0 et 100
            scrollPourcentage = Math.min(Math.max(scrollPourcentage, 0), 100);

            // Calculer la nouvelle position en pourcentage
            let nouvPosition = 40 - (scrollPourcentage * 0.3);

            // Appliquer la nouvelle position
            scrollAnim.style.transform = `translateX(${-nouvPosition}%)`;
        });
    }
});

// Sélectionne l'élément à animer
const elementAnime = document.querySelector(".conteneur");

// Variables pour suivre la vitesse de scroll, position précédente et position courante
let avantVitesseScroll = window.scrollY;
let VitesseScroll = 0;
let translateY = 0;
let cibleTranslateY = 0;

function animer() {
    // Interpole la position actuelle vers la cible pour un effet de lissage
    translateY += (cibleTranslateY - translateY) * 0.1;

    // Applique la transformation et l'opacité
    elementAnime.style.transform = `translateY(${translateY}px)`;
    
    // Continue à appeler animer pour des mises à jour fluides
    requestAnimationFrame(animer);
}

// Écoute l'événement de scroll pour mettre à jour la cible de translation
window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    VitesseScroll = Math.abs(scrollY - avantVitesseScroll);

    // Détecte la direction du scroll et calcule la cible de translation
    const direction = scrollY > avantVitesseScroll ? 1 : -1;
    cibleTranslateY = VitesseScroll * 4 * direction;

    // Ajuste l'opacité en fonction de la vitesse
    elementAnime.style.opacity = Math.max(1 - VitesseScroll / 50, 0); // Opacité minimum à 0

    // Met à jour la position précédente
    avantVitesseScroll = scrollY;
});

// Démarre l'animation
requestAnimationFrame(animer);

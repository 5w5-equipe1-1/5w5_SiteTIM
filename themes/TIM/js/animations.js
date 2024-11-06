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


document.addEventListener('DOMContentLoaded', () => {
    // Scroll in view
    let scrollElement = document.querySelector('.text_cercle');

    if (scrollElement) {
        scrollElement.addEventListener('click', () => {
            window.scrollTo({
                top: 800,
                behavior: 'smooth'
            });
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
            let scrollPercentage = ((value + windowHeight - elementTop) / windowHeight) * 100;

            // Limiter le pourcentage de défilement entre 0 et 100
            scrollPercentage = Math.min(Math.max(scrollPercentage, 0), 100);

            // Calculer la nouvelle position en pourcentage
            let newPosition = 60 - (scrollPercentage * 0.5);

            // Appliquer la nouvelle position
            scrollAnim.style.transform = `translateX(${-newPosition}%)`;
        });
    }
});




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


//Parallax
let fenceGauche = document.querySelector('.fence-gauche');
let fencedroite = document.querySelector('.fence-droite');

window.addEventListener('scroll', () => {
    let value = window.scrollY;

    // Ajuste la translation pour donner un effet de mouvement
    fenceGauche.style.transform = `translateX(${value * 0.4}px)`; 
    fencedroite.style.transform = `translateX(${value * -0.4}px)`;
});

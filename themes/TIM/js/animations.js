document.addEventListener("DOMContentLoaded", function(){
    const elementAfficher = document.querySelectorAll('.slide-trigger');

    const afficherElements = () => {
        const hauteurFenetre = window.innerHeight;
        elementAfficher.forEach(element =>{
            const positionElement =  element.getBoundingClientRect().top;
            if (positionElement < hauteurFenetre){
                element.classList.add('slide-in');
            }
        });
    };
    window.addEventListener('scroll', afficherElements);
    afficherElements();
});
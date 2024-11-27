document.addEventListener("DOMContentLoaded", () => {
  const hiddenElements = document.querySelectorAll(".hidden");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(
      (entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          entry.target.classList.remove("reverse");
          console.log("show");
        } else {
          entry.target.classList.remove("show");
          entry.target.classList.add("reverse");
          console.log("reverse");
        }
      },
      {
        threshold: 0.9,
        rootMargin: "0px 0px -100px 0px",
      }
    );
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
document.addEventListener("DOMContentLoaded", () => {
  // Scroll in view
  let scrollElement = document.querySelector(".text_cercle");

  if (scrollElement) {
    scrollElement.addEventListener("click", () => {
      window.scrollTo({
        top: 800,
        behavior: "smooth",
      });
      //l'element s’envole vers le haut
      scrollElement.style.transform = "translatey(-1000px)";
      scrollElement.style.transition = "transform 0.5s ease";
    });
  }

  // Scroll animation
  let scrollAnim = document.querySelector(".bannieres");

  if (scrollAnim) {
    window.addEventListener("scroll", () => {
      let value = window.scrollY;
      let elementTop = scrollAnim.getBoundingClientRect().top + window.scrollY;
      let windowHeight = window.innerHeight;

      // Calculer le pourcentage de défilement par rapport à la hauteur de la fenêtre
      let scrollPourcentage =
        ((value + windowHeight - elementTop) / windowHeight) * 100;

      // Limiter le pourcentage de défilement entre 0 et 100
      scrollPourcentage = Math.min(Math.max(scrollPourcentage, 0), 100);

      // Calculer la nouvelle position en pourcentage
      let nouvPosition = 40 - scrollPourcentage * 0.3;

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
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;
  VitesseScroll = Math.abs(scrollY - avantVitesseScroll);

  // Calculer un facteur inverse basé sur la vitesse
  const facteurInversion = Math.max(1 / (VitesseScroll + 1), 0.1); // Limite minimale de 0.1 pour éviter zéro

  // Détecte la direction du scroll et calcule la cible de translation
  const direction = scrollY > avantVitesseScroll ? 1 : -1;
  cibleTranslateY = 20 * facteurInversion * direction; // Ajuster '20' selon l'intensité souhaitée

  // Met à jour la position précédente
  avantVitesseScroll = scrollY;
});

// appeler l'animation
requestAnimationFrame(animer);








//animation de scoll 
document.addEventListener('DOMContentLoaded', () => {
  const sections = document.querySelectorAll('.animation_apparait');

  const observerOptions = {
   
   
    threshold: [0.1, 0.9] 
  };

  const observerCallback = (entries) => {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0.1) {
        entry.target.classList.add('visible');
      } else if (entry.intersectionRatio < 0.9) {
        entry.target.classList.remove('visible');
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);

  sections.forEach(section => observer.observe(section));
});


/*---------------------------------------------------------------------------------------------*/
/*-----------------------------animation cligonement ecriture----------------------------------*/
/*---------------------------------------------------------------------------------------------*/
 
const textTableau = ["Perspective d'emplois", "Avenir", "Études suppérieures"];
const elementBlink = document.querySelector(".contenue_desc");
 
let i = 0;
let effacer = false;
let textIndex = 0;
 
function typeText(){
  const text = textTableau[textIndex]
 
  if (!effacer) {
  // si i est infererieur a la longeur du texte
  if (i < text.length){
    //ajoute une lettre 
    //chatAt(i) permet de selectionner ou extraire une lettre a la position i
    elementBlink.innerHTML += text.charAt(i);
 
    //donne +1 a i pour sauter a la lettre suivante
    i++;
 
    // appele la fonction toute les 100ms
    setTimeout(typeText, 200);
  } else {
 
    effacer = true;
    //attendre avant de commencer a effacer
    setTimeout(typeText, 5000);
  }
} else {
  if (i > 0){
 
    //Prends le texte actuel dans innerHTML, coupe le dernier caractère et mets le résultat dans innerHTML.
 
    //(0, -1) prend la premier lettre et la derniere, (1 , -3) prend la deuxieme lettre et la troisieme derniere lettre
    elementBlink.innerHTML = elementBlink.innerHTML.slice(0, -1);
 
    i--;
    setTimeout(typeText, 70);
  } else {
    effacer = false;
    //passe au texte suivant dans le tableau
    textIndex++;
 
    //si lindex est superieur ou egal au nombre de texte dans le tableau reset lindex a 0
    if(textIndex >= textTableau.length){
      textIndex = 0;
    }
    setTimeout(typeText, 1000);
  }
}
}
 
//appelle la fonction
typeText();


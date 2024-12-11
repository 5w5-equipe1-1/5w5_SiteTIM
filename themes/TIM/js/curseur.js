// PAGE JAVASCRIPT DU CURSEUR DE L'UTILISATEUR SUR ORDINATEUR
// /////////////////////////////////////////////////////////////

//Récupérer la pseudo-classe :root
let leRoot = document.querySelector(":root");

//Mettre un gestionnaire d'événement sur le document pour le déplacement de la souris
document.addEventListener("mousemove", deplacerCurseur);

//L'élément HTML qui agira comme curseur personnalisé
let leCurseur = document.querySelector(".lesflechescurseur");
let miniPoint = document.querySelector(".minipoint");
let infoAction = document.querySelector(".info_action");

//L'image pour les tests de changement d'aspect de curseur
let leCube = document.querySelector(".cube");
// console.log(leCube);

//Écouteurs sur l'image
leCube.addEventListener("mouseover", changerCurseur);
leCube.addEventListener("mouseout", changerCurseur);

/**
 * Fonction permettant de déplacer le curseur à l'endroit du
 * pointeur de la souris dans l'écran
 *
 * @param {object Event} event objet Event passé au gestionnaire d'événement (informations sur l'événement MouseEvent distribué)
 */
function deplacerCurseur(event) {
  //Coordonnées X et Y du pointeur officiel de la souris
  //console.log("client X, Y : ", event.clientX, event.clientY);
  //On change ici les valeurs des variables CSS déclarées
  leRoot.style.setProperty("--mouse-x", event.clientX + "px");
  leRoot.style.setProperty("--mouse-y", event.clientY + "px");
}

/**
 * Fonction permettant de changer l'aspect du curseur au survol ou non d'un élément
 *
 * @param {object Event} event objet Event passé au gestionnaire d'événement (informations sur l'événement MouseEvent distribué)
 */
function changerCurseur(event) {
  //On modifie la visibilité du curseur selon l'événement
  //Sans modifier le display de la mise en page
  if (event.type == "mouseover") {
    leCurseur.style.visibility = "visible";
    miniPoint.style.visibility = "hidden";

    if (infoAction) {
      infoAction.style.fontSize = "20pt";
      infoAction.style.opacity = "1";
    }
  } else {
    leCurseur.style.visibility = "hidden";
    miniPoint.style.visibility = "visible";

    if (infoAction) {
      infoAction.style.fontSize = "12pt";
      infoAction.style.opacity = "0";
    }
  }
}

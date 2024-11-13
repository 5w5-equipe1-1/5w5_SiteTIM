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
      infoAction.style.fontSize = "16pt";
      infoAction.style.opacity = "1";
    }
  } else {
    leCurseur.style.visibility = "hidden";
    miniPoint.style.visibility = "visible";

    if (infoAction) {
      infoAction.style.fontSize = "12pt";
      infoAction.style.opacity = "0.3";
    }
  }
}

window.onload = function () {
  const body = document.body;
  const nombreMaxDot = 500; // Nombre initial de points à générer
  const maxDistance = 60; // Rayon de 60px pour détecter le curseur

  // Tableau pour stocker les points
  const dots = [];

  let compteurDot = 0;

  // Fonction pour positionner les points
  function positionDot() {
    const dot = document.createElement("div"); // Créer un nouvel élément <div>
    dot.classList.add("dot"); // Ajouter la classe 'dot' à l'élément

    // Calculer la grandeur de la page et s'assurer qu'il est visible entièrement
    const maxX = body.scrollWidth - dot.offsetWidth; // Utiliser la largeur totale du body
    const maxY = body.scrollHeight - dot.offsetHeight; // Utiliser la hauteur totale du body

    // Position aléatoire initiale
    let randomX = Math.random() * maxX;
    let randomY = Math.random() * maxY;

    // Appliquer la position aléatoire initiale
    dot.style.left = `${randomX}px`;
    dot.style.top = `${randomY}px`;

    // Ajouter l'élément .dot au body
    body.appendChild(dot);

    // Ajouter le point au tableau avec sa position initiale
    dots.push({ dot, x: randomX, y: randomY, timeout: null });
    compteurDot++;

    // Supprimer le point le plus ancien si le nombre maximal est dépassé
    if (compteurDot > nombreMaxDot) {
      const oldestDot = dots.shift(); // Retirer le point le plus ancien du tableau
      if (body.contains(oldestDot.dot)) {
        body.removeChild(oldestDot.dot);
        compteurDot--;
      }
    }
  }

  // Détecter la position du curseur
  body.addEventListener("mousemove", (event) => {
    // utiliser page au lieu de client parce que si la page est plus
    // grosse que la fenetre ca ne fonctionne pas
    const mouseX = event.pageX;
    const mouseY = event.pageY;

    // Boucle pour vérifier la distance entre chaque point et le curseur
    dots.forEach((point) => {
      const dx = point.x - mouseX; // Calcul de la différence en X
      const dy = point.y - mouseY; // Calcul de la différence en Y
      const distance = Math.sqrt(dx * dx + dy * dy); // Calcul de la distance euclidienne

      // Si le point est dans le rayon de 60px du curseur, on le rapproche
      if (distance < maxDistance) {
        // Déplacement du point vers le curseur
        const moveX = (mouseX - point.x) * 0.1; // Légèrement déplacé vers le curseur
        const moveY = (mouseY - point.y) * 0.1;

        // Mettre à jour la position du point
        point.x += moveX;
        point.y += moveY;

        point.dot.style.left = `${point.x}px`;
        point.dot.style.top = `${point.y}px`;

        // Si un point est proche du curseur, on commence un timer pour le supprimer après 5 secondes
        if (!point.timeout) {
          point.timeout = setTimeout(() => {
            // Vérifier si le point est toujours un enfant du body avant de le supprimer
            if (body.contains(point.dot)) {
              body.removeChild(point.dot); // Supprimer le point du DOM

              //diminue de 1 le compteur
              compteurDot--;
            }
          }, 100); // 5000 ms = 5 secondes
        }
      }
    });
  });

  // Ajouter un nouveau point toutes les 0.2 secondes
  setInterval(positionDot, 2000); // 200 ms = 0.2 sec
};

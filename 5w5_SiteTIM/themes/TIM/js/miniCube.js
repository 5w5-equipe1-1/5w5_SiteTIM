const miniCube = document.querySelector(".minicube");
const footer = document.querySelector("footer");

// Function to calculate the mouse position
function MiniCubeTourne(event) {
  const rect = footer.getBoundingClientRect();
  const mouseX = event.clientX - rect.left;
  const mouseY = event.clientY - rect.top;

  const centerX = rect.width / 2;
  const centerY = rect.height / 2;

  const deltaX = mouseX - centerX;
  const deltaY = mouseY - centerY;

  const rotationX = (deltaY / centerY) * 30; // Rotate on X-axis
  const rotationY = -(deltaX / centerX) * 30; // Rotate on Y-axis

  miniCube.style.transform = `rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
}

// Add event listener to track mouse movement
footer.addEventListener("mousemove", MiniCubeTourne);


window.onload = function() {
  const body = document.body;
  const nombreMaxDot = 500; // Nombre initial de points à générer
  const maxDistance = 60; // Rayon de 60px pour détecter le curseur

  // Tableau pour stocker les points
  const dots = [];

  let compteurDot = 0;

  // Fonction pour positionner les points
  function positionDot() {
      
          const dot = document.createElement('div');  // Créer un nouvel élément <div>
          dot.classList.add('dot');                    // Ajouter la classe 'dot' à l'élément



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
  body.addEventListener('mousemove', (event) => {

      // utiliser page au lieu de client parce que si la page est plus 
      // grosse que la fenetre ca ne fonctionne pas
      const mouseX = event.pageX;
      const mouseY = event.pageY;

      // Boucle pour vérifier la distance entre chaque point et le curseur
      dots.forEach(point => {
          const dx = point.x - mouseX;  // Calcul de la différence en X
          const dy = point.y - mouseY;  // Calcul de la différence en Y
          const distance = Math.sqrt(dx * dx + dy * dy); // Calcul de la distance euclidienne

          // Si le point est dans le rayon de 60px du curseur, on le rapproche
          if (distance < maxDistance) {
              // Déplacement du point vers le curseur
              const moveX = (mouseX - point.x) * 0.1;  // Légèrement déplacé vers le curseur
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
  setInterval(positionDot, 200); // 200 ms = 0.2 sec
};

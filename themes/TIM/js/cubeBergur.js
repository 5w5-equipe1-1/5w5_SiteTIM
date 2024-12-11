// PAGE D'INTÉRACTION OFFICIELLE AVEC LE CUBE DE NAV
// Javascript du cube burger + ces intéractions de navigation
// ///////////////////////////////////////////////////////////////

let cube = document.getElementById("cube");
let lesFaces = document.querySelectorAll(".face");
let scene = document.getElementById("sceneBurguer");
let isCubeSelected = false; //selection d'une face du cube
let touchStart = { x: 0, y: 0 };
let mouseStart = { x: 0, y: 0 };
let rotation = { x: 0, y: 0 };
let autoRotate = true;
let rotateTimeout;
const sensitivity = 1.2;
let initialRotationSpeed = 10;
let finalRotationSpeed = 0.12;

// Rotation automatique du cube
function rotateCubeAutomatically() {
  if (autoRotate) {
    if (initialRotationSpeed > finalRotationSpeed) {
      initialRotationSpeed *= 0.98;
    }
    rotation.y -= initialRotationSpeed;
    cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
  }
  requestAnimationFrame(rotateCubeAutomatically);
}

rotateCubeAutomatically();

function updateCubeRotation() {
  cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
}

// Pour faire tourner le cube avec la souris:
function onMouseMove(event) {
  if (!isCubeSelected) {
    if (!scene.classList.contains("shrink")) {
      autoRotate = false;
      const deltaX = event.clientX - mouseStart.x;
      const deltaY = event.clientY - mouseStart.y;
      rotation.y += deltaX * sensitivity;
      rotation.x -= deltaY * sensitivity;
      mouseStart = { x: event.clientX, y: event.clientY };
      updateCubeRotation();
    }
  }
}

// Pour faire tourner le cube avec le toucher:
function onTouchMove(event) {
  if (!isCubeSelected) {
    if (!scene.classList.contains("shrink") && event.touches.length > 0) {
      autoRotate = false;
      const touch = event.touches[0];
      const deltaX = touch.clientX - touchStart.x;
      const deltaY = touch.clientY - touchStart.y;
      rotation.y += deltaX * sensitivity;
      rotation.x -= deltaY * sensitivity;
      touchStart = { x: touch.clientX, y: touch.clientY };
      updateCubeRotation();
    }
  }
}

//quand la souris est relachée
function onMouseUp() {
  document.removeEventListener("mousemove", onMouseMove);
  document.removeEventListener("mouseup", onMouseUp);
  cube.style.transition = "transform 0.1s ease-out";
  rotateTimeout = setTimeout(() => {
    autoRotate = true;
  }, 0);
  isCubeSelected = false;
}

// Quand le toucher est relaché:
function onTouchEnd() {
  document.removeEventListener("touchmove", onTouchMove);
  document.removeEventListener("touchend", onTouchEnd);
  cube.style.transition = "transform 0.1s ease-out";
  rotateTimeout = setTimeout(() => {
    autoRotate = true;
  }, 0);
  isCubeSelected = false;
}

document.addEventListener("mousedown", function (event) {
  mouseStart = { x: event.clientX, y: event.clientY };
  document.addEventListener("mousemove", onMouseMove);
  document.addEventListener("mouseup", onMouseUp);
});

document.addEventListener("touchstart", function (event) {
  const touch = event.touches[0];
  touchStart = { x: touch.clientX, y: touch.clientY };
  document.addEventListener("touchmove", onTouchMove);
  document.addEventListener("touchend", onTouchEnd);
});

// Rotation du cube lors du clic sur une face - selection d'une face du cube et affichage plus grosse
lesFaces.forEach((face) => {
  face.addEventListener("click", function (event) {
    if (scene.classList.contains("shrink")) {
      scene.classList.remove("shrink");
      // Empêche le défilement de la page lors de la sélection d'une face du cube
      document.body.style.overflowY = "hidden";
      // Empêche la propagation de l'événement de click
      for (let explorerButton of LesButtonsExplorer) {
        explorerButton.style.display = "block";
      }
      event.stopPropagation();
    } else {
      isCubeSelected = true;
      autoRotate = false;
      clearTimeout(rotateTimeout);
      cube.style.transition = "transform 1s";
      switch (this.id) {
        case "front":
          rotation.x = 0;
          rotation.y = 0;
          break;
        case "back":
          rotation.x = 0;
          rotation.y = 180;
          break;
        case "right":
          rotation.x = 0;
          rotation.y = -90;
          break;
        case "left":
          rotation.x = 0;
          rotation.y = 90;
          break;
        case "top":
          rotation.x = -90;
          rotation.y = 0;
          break;
        case "bottom":
          rotation.x = 90;
          rotation.y = 0;
          break;
      }
      cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;

      // Ajuster le zoom pour les appareils mobiles
      if (window.innerWidth <= 768) {
        scene.style.perspective = "300px";
      } else {
        scene.style.perspective = "160px";
      }
    }
  });
});

// Fonction pour gérer la transition du cube lorsqu'on clique à l'extérieur
// Remettre le cube à sa place lorsque l'utilisateur ne navigue pas.
document.addEventListener("click", function (event) {
  if (!event.target.closest(".cube")) {
    if (!scene.classList.contains("shrink")) {
      scene.classList.add("shrink");
      //remettre la perspective par défaut
      scene.style.perspective = "600px";
      //remettre le scroll par défaut
      document.body.style.overflowY = "auto";
      for (let explorerButton of LesButtonsExplorer) {
        explorerButton.style.display = "none";
      }
    }
  }
});

//changement de page lors du clic sur le bouton
let boutonChangement = document.querySelector(".bouton_cube");

boutonChangement.addEventListener("click", function () {
  scene.classList.toggle("shrink");
  if (scene.classList.contains("shrink")) {
    // Disable user rotation and enable auto-rotation
    disableUserRotation();
    autoRotate = true;
    for (let explorerButton of LesButtonsExplorer) {
      explorerButton.style.display = "none";
    }
  } else {
    // Enable user rotation when returning to normal state
    enableUserRotation();
    autoRotate = false;
  }
});

// Le contrôle de Rotation de l'utilisateur - (User Rotation Control)
let userRotationAllowed = true;

// Fonction qui permet la rotation de l'utilisateur - (Function to enable user rotation)
function enableUserRotation() {
  userRotationAllowed = true;
  document.addEventListener("mousemove", onMouseMove);
  document.addEventListener("mouseup", onMouseUp);
  document.addEventListener("touchmove", onTouchMove);
  document.addEventListener("touchend", onTouchEnd);
}

// Fonction pour désactiver la rotation de l'utilisateur - Function to disable user rotation
function disableUserRotation() {
  userRotationAllowed = false;
  document.removeEventListener("mousemove", onMouseMove);
  document.removeEventListener("mouseup", onMouseUp);
  document.removeEventListener("touchmove", onTouchMove);
  document.removeEventListener("touchend", onTouchEnd);
}

// Ajout de la classe shrink lors du clic sur le bouton Explorer
let LesButtonsExplorer = document.querySelectorAll(".bouton_cube");
for (let explorerButton of LesButtonsExplorer) {
  explorerButton.addEventListener("click", function (event) {
    event.stopPropagation(); // Empêche la propagation de l'événement de clic
    scene.classList.add("shrink");
  });
}

// Ajout de la classe shrink par défaut
window.onload = function () {
  scene.classList.add("shrink");
};

if (scene.classList.contains("shrink")) {
  for (let explorerButton of LesButtonsExplorer) {
    explorerButton.style.display = "none";
  }
}

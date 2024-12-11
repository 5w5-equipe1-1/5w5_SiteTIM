//code JS pour le cube - le menu burger quand il est ouvert et un élément de la page d'accueil
// CODE OFFICIEL DE PERSPECTIVE DU CUBE (menu principal et page des catégories combinés)
// /////////////////////////////////////////////////////////////////////////////////////////

// Définition des variables
let cube = document.getElementById("cube");
let lesFaces = document.querySelectorAll(".face");
let scene = document.getElementById("scene");
let isCubeSelected = false;
let touchStart = { x: 0, y: 0 };
let mouseStart = { x: 0, y: 0 };
let rotation = { x: -20, y: 0 };
let autoRotate = true;
let rotateTimeout;
const sensitivity = 1.2;
let initialRotationSpeed = 10;
let finalRotationSpeed = 0.12;

for (let face of lesFaces) {
  face.addEventListener("click", enleverClassShrink);
}

// Rotation automatique du cube
function rotateCubeAutomatically() {
  // if(Number.isInteger(rotation.y / 360)){
  //   rotation.y = 0;
  //   console.log("rotation.y = 0");
  // }
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

// Mise à jour de la rotation du cube
function updateCubeRotation() {
  cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
}

//interactions de la souris sur le cube
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

//interactions du toucher sur le cube
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

//quand le toucher est relaché
function onTouchEnd() {
  document.removeEventListener("touchmove", onTouchMove);
  document.removeEventListener("touchend", onTouchEnd);
  cube.style.transition = "transform 0.1s ease-out";
  rotateTimeout = setTimeout(() => {
    autoRotate = true;
  }, 0);
  isCubeSelected = false;
}

// Event listener sur la souris (enlevé)
document.addEventListener("mousedown", function (event) {
  mouseStart = { x: event.clientX, y: event.clientY };
  document.addEventListener("mousemove", onMouseMove);
  document.addEventListener("mouseup", onMouseUp);
});

// Event listener sur la souris (par dessus)
document.addEventListener("touchstart", function (event) {
  const touch = event.touches[0];
  touchStart = { x: touch.clientX, y: touch.clientY };
  document.addEventListener("touchmove", onTouchMove);
  document.addEventListener("touchend", onTouchEnd);
});

// Selection des faces du cube pour focusser sur une face
document.querySelectorAll(".cube div").forEach((face) => {
  face.addEventListener("click", function () {
    if (scene.classList.contains("shrink")) {
      scene.classList.remove("shrink");
    }
    isCubeSelected = true;
    // Empêche le défilement de la page lors de la sélection d'une face du cube
    document.body.style.overflowY = "hidden";
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
  });
});

// Event listener de click sur le cube (style et perspective, animation)
document.addEventListener("click", function (event) {
  if (!event.target.closest(".cube")) {
    if (scene.classList.contains("shrink")) return; // Ignore click if not in shrink state
    // Return to normal state with zoom-out effect
    scene.classList.remove("shrink");
    isCubeSelected = false;
    scene.style.perspective = "600px";
    cube.style.transition = "transform 0.1s ease-out";
    cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
    setTimeout(() => {
      autoRotate = true;
    }, 0);
    document.body.style.overflowY = "auto";
  }
});

//selectionner les boutons sur le cube pour le faire rapetisser
let boutonChangement = document.querySelectorAll(".bouton_cube");
for (let bouton of boutonChangement) {
  bouton.addEventListener("click", function () {
    scene.classList.toggle("shrink");
    if (scene.classList.contains("shrink")) {
      // Disable user rotation and enable auto-rotation
      disableUserRotation();
      autoRotate = true;
    } else {
      // Enable user rotation when returning to normal state
      enableUserRotation();
      autoRotate = false;
    }
  });
}

// User Rotation Control
let userRotationAllowed = true;

// Function to enable user rotation
function enableUserRotation() {
  userRotationAllowed = true;
  document.addEventListener("mousemove", onMouseMove);
  document.addEventListener("mouseup", onMouseUp);
  document.addEventListener("touchmove", onTouchMove);
  document.addEventListener("touchend", onTouchEnd);
}

// Function to disable user rotation
function disableUserRotation() {
  userRotationAllowed = false;
  document.removeEventListener("mousemove", onMouseMove);
  document.removeEventListener("mouseup", onMouseUp);
  document.removeEventListener("touchmove", onTouchMove);
  document.removeEventListener("touchend", onTouchEnd);
}

function enleverClassShrink(event) {
  console.log("enleverClassShrink");
  if (scene.classList.contains("shrink")) {
    scene.classList.remove("shrink");
  }
}

// Ajout de la classe shrink lors du clic sur le bouton Explorer
//creer une erreur mais fonctionne - pour une autre page que la page d'accueil
// let explorerButton = document.getElementById("explorerButton");
// explorerButton.addEventListener("click", function (event) {
//   event.stopPropagation(); // Empêche la propagation de l'événement de clic
//   scene.classList.add("shrink");
// });

// Enlever la classe shrink lors du clic sur une face
lesFaces.forEach((face) => {
  face.addEventListener("click", function (event) {
    if (scene.classList.contains("shrink")) {
      scene.classList.remove("shrink");
    }
  });
});

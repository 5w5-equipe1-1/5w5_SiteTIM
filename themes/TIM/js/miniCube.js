const miniCube = document.querySelector(".minicube");
const footer = document.querySelector("body");

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

//code JS pour le cube - le menu burger quand il est ouvert et un élément de la page d'accueil
let cube = document.getElementById('cube');
        let scene = document.getElementById('scene');
        let isCubeSelected = false;
        let touchStart = { x: 0, y: 0 };
        let mouseStart = { x: 0, y: 0 };
        let rotation = { x: 0, y: 0 };
        let autoRotate = true;  // Variable to control auto-rotation
        let rotateTimeout;  // Timeout pour démarrer la rotation après 1 seconde
        const sensitivity = 1.2;  // Augmentation du facteur de rotation

        // Variable pour gérer la vitesse de rotation initiale
        let initialRotationSpeed = 10;
        let finalRotationSpeed = 0.12;

        // Rotation continue du cube
        function rotateCubeAutomatically() {
            if (autoRotate && !isCubeSelected) {
                // Si la vitesse initiale est encore active, la diminuer progressivement
                if (initialRotationSpeed > finalRotationSpeed) {
                    initialRotationSpeed *= 0.98;  // Diminuer la vitesse progressivement
                }

                rotation.y -= initialRotationSpeed;  // Rotation sur l'axe Y
                cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
            }
            requestAnimationFrame(rotateCubeAutomatically);
        }

        // Initialiser l'auto-rotation
        rotateCubeAutomatically();

        function updateCubeRotation() {
            if (!isCubeSelected) {
                cube.style.transition = 'none';  // Désactiver les transitions pendant le déplacement
                cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
            }
        }

        function onMouseMove(event) {
            autoRotate = false;  // Désactiver l'auto-rotation en cas d'interaction
            clearTimeout(rotateTimeout);  // Réinitialiser le délai de rotation
            const deltaX = event.clientX - mouseStart.x;
            const deltaY = event.clientY - mouseStart.y;

            rotation.y += deltaX * sensitivity;
            rotation.x -= deltaY * sensitivity;

            mouseStart = { x: event.clientX, y: event.clientY };

            updateCubeRotation();
        }

        function onTouchMove(event) {
            autoRotate = false;  // Désactiver l'auto-rotation en cas d'interaction
            clearTimeout(rotateTimeout);  // Réinitialiser le délai de rotation
            if (event.touches.length > 0) {
                const touch = event.touches[0];
                const deltaX = touch.clientX - touchStart.x;
                const deltaY = touch.clientY - touchStart.y;

                rotation.y += deltaX * sensitivity;
                rotation.x -= deltaY * sensitivity;

                touchStart = { x: touch.clientX, y: touch.clientY };

                updateCubeRotation();
            }
        }

        function onMouseUp() {
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
            cube.style.transition = 'transform 0.1s ease-out';  // Réactiver la transition après le mouvement
            // Définir un délai de 1 seconde avant de réactiver l'auto-rotation
            rotateTimeout = setTimeout(() => {
                autoRotate = true;
            }, 1000);  // Délai de 1 seconde
        }

        function onTouchEnd() {
            document.removeEventListener('touchmove', onTouchMove);
            document.removeEventListener('touchend', onTouchEnd);
            cube.style.transition = 'transform 0.1s ease-out';  // Réactiver la transition après le mouvement
            // Définir un délai de 1 seconde avant de réactiver l'auto-rotation
            rotateTimeout = setTimeout(() => {
                autoRotate = true;
            }, 0);  // Délai de 1 seconde
        }

        document.addEventListener('mousedown', function(event) {
            if (!isCubeSelected || event.target.closest('.cube')) {
                mouseStart = { x: event.clientX, y: event.clientY };
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            }
        });

        document.addEventListener('touchstart', function(event) {
            if (!isCubeSelected || event.target.closest('.cube')) {
                const touch = event.touches[0];
                touchStart = { x: touch.clientX, y: touch.clientY };
                document.addEventListener('touchmove', onTouchMove);
                document.addEventListener('touchend', onTouchEnd);
            }
        });

        document.querySelectorAll('.cube div').forEach(face => {
            face.addEventListener('click', function() {
                isCubeSelected = true;
                autoRotate = false;  // Arrêter l'auto-rotation lorsque zoomé
                clearTimeout(rotateTimeout);  // Réinitialiser le délai de rotation
                cube.style.transition = 'transform 1s';  // Réactiver les transitions pour le zoom
                switch (this.id) {
                    case 'front':
                        rotation.x = 0;
                        rotation.y = 0;
                        break;
                    case 'back':
                        rotation.x = 0;
                        rotation.y = 180;
                        break;
                    case 'right':
                        rotation.x = 0;
                        rotation.y = -90;
                        break;
                    case 'left':
                        rotation.x = 0;
                        rotation.y = 90;
                        break;
                    case 'top':
                        rotation.x = -90;
                        rotation.y = 0;
                        break;
                    case 'bottom':
                        rotation.x = 90;
                        rotation.y = 0;
                        break;
                }
                cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;

                // Ajuster le zoom pour les appareils mobiles
                if (window.innerWidth <= 768) {
                    scene.style.perspective = '300px'; // Zoomer plus près pour les mobiles
                } else {
                    scene.style.perspective = '140px'; // Zoomer à une distance standard pour les autres appareils
                }
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.cube')) {
                isCubeSelected = false;
                scene.style.perspective = '600px';
                cube.style.transition = 'transform 0.1s ease-out';  // Réactiver la transition pour revenir à la normale
                cube.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
                // Réactiver l'auto-rotation après 1 seconde
                rotateTimeout = setTimeout(() => {
                    autoRotate = true;
                }, 0);
            }
        });
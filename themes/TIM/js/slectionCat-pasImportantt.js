// PAS IMPORTANT 

document.addEventListener('DOMContentLoaded', function() {
    // Sélectionne tous les éléments avec la classe .bouton_cube - DONC MARCHE SEULEMENT SUR LE CUBE
    const buttons = document.querySelectorAll('.bouton_cube'); 
    buttons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const buttonId = this.id;

            fetch('<?php echo get_template_directory_uri(); ?>/categories.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${buttonId}`
            })
            .then(response => response.text())
            .then(data => {
                // Afficher la réponse de categories.php
                console.log(data);
                // Vous pouvez également rediriger vers categories.php avec l'ID en paramètre
                window.location.href = `<?php echo get_template_directory_uri(); ?>/categories.php?id=${buttonId}`;
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
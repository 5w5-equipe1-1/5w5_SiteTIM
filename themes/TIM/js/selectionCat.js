(function () {
    console.log("rest API");
    let boutons_cube = document.querySelectorAll(".bouton_cube");

    boutons_cube.forEach(elm => {
        elm.addEventListener("click", function (e) {
            let cat = e.target.id; // Extract the category name from the button ID
            console.log("Categorie sélectionné: ", cat);

            // Construire l'URL avec l'ID de la catégorie
            let url = `categories.php?category=${cat}`;

            // Rediriger vers l'URL construite
            window.location.href = url;
        });
    });
})();
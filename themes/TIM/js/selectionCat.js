(function () {
  //console.log("rest API");
  let boutons_cube = document.querySelectorAll(".bouton_cube");

  boutons_cube.forEach((elm) => {
    elm.addEventListener("click", function (e) {
      e.preventDefault(); // Prevent the default link behavior

      // Utiliser e.currentTarget pour obtenir l'élément auquel l'événement est attaché
      let cat = e.currentTarget.id; // Extract the category name from the button ID
      console.log("Categorie sélectionné: ", cat);

      // Vérifiez si l'ID est bien récupéré
      if (!cat) {
        console.error("Erreur: L'ID de la catégorie n'a pas été récupéré.");
        return;
      }

      //PAS OUBLIER DE CHANGER POUR LES TESTS EN LOCALHOST!!!
      // ////////////////////////////////////////////////////////

      // Construire l'URL avec l'ID de la catégorie
      //let url = `http://localhost/5w5gabrielle/wp-content/themes/TIM/categories.php?category=${cat}`;

      // Construire l'URL avec l'ID de la catégorie de yannick
      let url = `http://localhost/5w5/wp-content/themes/TIM/categories.php?category=${cat}`;

      //console.log("URL construite: ", url);
      // Construire l'URL avec l'ID de la catégorie
      //let url = `http://localhost/5w5_ELOI_v2/wp-content/themes/TIM/categories.php?category=${cat}`;
      //let url = `https://gftnth00.mywhc.ca/tim23/wp-content/themes/TIM/categories.php?category=${cat}`;

      // Rediriger l'utilisateur vers la nouvelle page
      window.location.href = url;
    });
  });
})();
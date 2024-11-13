<!-- Entete personnaliser pour la page d'Accueil et 404 -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css';?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css';?>">
    <link rel="stylesheet" href="https://use.typekit.net/law8uer.css">
    <title>TIM - Accueil</title>
</head>
<body>
    <header>
        <div class="conteneur_logo_tim">
        <a href="<?php echo get_home_url();?>">
            <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
        </a>
        <a href="<?php echo get_home_url();?>">
            <h2 class="TIM_entete">Techniques <br> d'intégration multimédia</h2>
        </a>
        </div>
        <div class="conteneur_burger_recherche">
            <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche" value name="s" id="s">
                <button type="submit" id="searchsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </header>
    <main>  
        <div class="">
            <div class="">
                <div class="">
                    <h1>Erreur 404</h1>
                    <h3>La page que vous cherchez n'existe pas.</h3>
                    <button><a href="<?php echo get_home_url();?>">Retour à la page d'accueil</a></button>
                </div>
            </div>
        </div>
    </main>
<?php 
    get_footer(); // Afficher le footer
?>
        <!-- API fontawsome pour les icones -->
        <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
        <!-- Script pour les animations de scroll -->
        <script src="<?php echo get_template_directory_uri() ."/js/animations.js"?>"></script>
        <!-- Script pour le menu burger -->
        <script src="<?php echo get_template_directory_uri() ."/js/cubeBergur.js"?>"></script>
        <!-- inclure le script qui gere le changement de page -->
        <script src="<?php echo get_template_directory_uri() . "/js/selectionCat.js"?>"></script>
        <!-- inclure le script pour le carrousel -->
        <script src="<?php echo get_template_directory_uri() . "/js/carrousel.js"?>"></script>
    </body>
</html>
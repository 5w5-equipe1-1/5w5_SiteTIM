<?php 
    // Récupérer la catégorie sélectionnée pour l'afficher dans le title
    if (isset($_GET['category']) && term_exists($_GET['category'])) {
        $cat = get_category_by_slug($_GET['category']);
        $cat = $cat->name;	
    }else if(is_404()){
        $cat = "404";
    }
?>
<!-- Entete personnaliser pour les autres page que la page d'Accueil et 404 -->
<!-- ////////////////////////////////////////////////// -->
 
<!DOCTYPE html>
<html lang="fr">
<!-- Balise head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css';?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css';?>">
    <link rel="stylesheet" href="https://use.typekit.net/law8uer.css">
    <link rel="icon" href="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/12/icone.png">
    <title>TIM - <?php echo esc_html($cat); ?></title>
</head>
<!-- Partie du contenu de la page 404 -->
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
        <!-- conteneur de la recherche -->
        <div class="conteneur_burger_recherche">
            <!-- <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche" value name="s" id="s">
                <button type="submit" id="searchsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> -->
            <?php get_search_form(); ?>
        </div>
    </header>
    <!-- la page avec les information -->
    <main class="conteneur_404">
      <div class="erreur">
        <h1 class="error-code">404</h1>
        <h1 class="error-text">Oups! Page introuvable</h1>
        <br /><br /><br /><br />
        <a href="<?php echo get_home_url();?>" class="retour">Retourner à la page d'accueil</a>
      </div>
        <div class="scene" id="scene">
            <!-- Les degradés derrière le cube -->
            <div class="commundegrade degrade1orange"></div>
            <div class="commundegrade degrade1cyan"></div>
            <div class="commundegrade degrade1magenta"></div>
 
            <!-- le cube en tant que tel -->
            <div class="cube" id="cube">
                <div class="front" id="front">
                    <h3>3D</h3>
                    <button class="bouton_cube" id="3d">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
                <div class="back" id="back">
                    <h3>Jeux vidéos</h3>
                    <button class="bouton_cube" id="jeux_video">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
                <div class="right" id="right">
                    <h3>Films</h3>
                    <button class="bouton_cube" id="film">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
                <div class="left" id="left">
                    <h3>Design</h3>
                    <button class="bouton_cube" id="design">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
                <div class="top" id="top">
                    <h3>Web</h3>
                    <button class="bouton_cube" id="web">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
                <div class="bottom" id="bottom">
                    <h3>Formation spécifique</h3>
                    <button class="bouton_cube" id="formation_specifique">
                        <a href="categories.php">En savoir plus</a>
                    </button>
                </div>
            </div>
            <p class="info_action"><!--Pssst! Hey! Tournez-moi!--></p>
        </div>
    </main>
<?php 
    get_footer(); // Afficher le footer
?>

        <!-- Pas touche! C'est un curseur qui est sous la souris  
    lorsque l'utilisateur est dessus le cube! -->
    <div class="hovercurseur">
        <div class="minipoint"></div>
        <img class="lesflechescurseur" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/flecheHoverCube.png" alt="">
    </div>

        <!-- API fontawsome pour les icones -->
        <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
        <!-- Script pour les animations de scroll -->
        <script src="<?php echo get_template_directory_uri() ."/js/animations.js"?>"></script>
        <!-- inclure le script qui gere le cube 3D -->
        <script src="<?php echo get_template_directory_uri() . "/js/cube.js"?>"></script>
        <!-- inclure le script qui gere le changement de page -->
        <script src="<?php echo get_template_directory_uri() . "/js/selectionCat.js"?>"></script>
        <!-- inclure le script pour le carrousel -->
        <script src="<?php echo get_template_directory_uri() . "/js/carrousel.js"?>"></script>
    </body>
</html>
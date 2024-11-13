<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/normalize.css"?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/style.css"?>">
    <link rel="stylesheet" href="https://use.typekit.net/law8uer.css">
    <title>TIM - Accueil</title>
</head>
<body>
    <header>
        <div class="conteneur_logo_tim" href="<?php echo get_home_url();?>">
            <a href="<?php echo get_home_url();?>">
                <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            </a>
            <h2 href="<?php echo get_home_url();?>" class="TIM_entete">Techniques <br> d'intégration multimédia</h2>
   
        </div>
       <div class="conteneur_burger_recherche">
            <!-- <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche" value name="s" id="s">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> -->
              <?php get_search_form(); ?>
            <div class="sceneBurguer" id="sceneBurguer">
                <div class="cube" id="cube">
                    <div class="front face" id="front">
                        <h3>3D</h3>
                        <button class="bouton_cube" id="3d">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                    <div class="back face" id="back">
                        <h3>Jeux vidéos</h3>
                        <button class="bouton_cube" id="jeux_video">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                    <div class="right face" id="right">
                        <h3>Films</h3>
                        <button class="bouton_cube" id="film">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                    <div class="left face" id="left">
                        <h3>Design</h3>
                        <button class="bouton_cube" id="design">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                    <div class="top face" id="top">
                        <h3>Web</h3>
                        <button class="bouton_cube" id="web">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                    <div class="bottom face" id="bottom">
                        <h3>Formation spécifique</h3>
                        <button class="bouton_cube" id="formation_specifique">
                            <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
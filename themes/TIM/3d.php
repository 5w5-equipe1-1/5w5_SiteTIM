<?php
//recuperer le fichier la categorie 3D
    $cat = get_category("3D");          
    $nom_cat = $cat->name;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css';?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css';?>">
    <title>TIM - <?php echo $nom_cat;?></title>
</head>
<body>
    <header>
        <div class="conteneur_logo_tim">
            <img href="index.html" src="images/logo/tim.png" alt="Logo TIM" class="logo_tim">
            <h2 class="TIM_entete">Techniques <br> d'intégration multimédia</h2>
        </div>
        <div class="conteneur_burger_recherche">
            <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="scene_burguer" id="scene_burguer">
                <div class="cube" id="cube">
                    <div class="front face" id="front">
                        <h3>3D</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                    <div class="back face" id="back">
                        <h3>Jeux vidéos</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                    <div class="right face" id="right">
                        <h3>Films</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                    <div class="left face" id="left">
                        <h3>Design</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                    <div class="top face" id="top">
                        <h3>Web</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                    <div class="bottom face" id="bottom">
                        <h3>Formation spécifique</h3>
                        <button class="bouton_cube">
                            <a href="">En savoir plus</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="section_hero">
            <video src=""></video>
            <div class="text_hero">
                <h1><?php echo $nom_cat; ?></h1>
                <h3>Sous titre</h3>
            </div>
        </div>
        <div class="galerie">
        </div>
        <div class="cours">
            <?php
            //recuperer les posts de la categorie 3D
            if(have_posts()):
                foreach(get_posts() as $post):
            ?>
                    <details>
                        <summary class="summary_<?php echo $post->ID?>"><?php echo $post->titre?></summary>
                        <p class="description_cours"><?php echo $post->description?></p>
                    </details>
                <?php endforeach;?>
            <?php endif;?>
            
        </div>
    </main>
    <footer>
    </footer>
    <!-- API fontawsome pour les icones -->
    <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
    <!-- Script pour les animations de scroll -->
    <script src="js/animations.js"></script>
    <!-- Script pour le menu burger -->
     <script src="js/cubeBergur.js"></script>
</body>
</html>
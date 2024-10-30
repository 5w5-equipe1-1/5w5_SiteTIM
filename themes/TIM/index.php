<!-- Entete personnaliser pour la page d'Accueil -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css';?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css';?>">
    <title>TIM - Accueil</title>
</head>
<body>
    <header>
        <div class="conteneur_logo_tim">
        <a href="<?php echo get_home_url();?>"><img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim"></a>
            <h2 class="TIM_entete">Techniques <br> d'intégration multimédia</h2>
        </div>
        <div class="conteneur_burger_recherche">
            <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche" value name="s" id="s">
                <button type="submit" id="searchsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </header>
    <!-- la page avec les information -->
    <main class="conteneur">

    <!-- <div class="degrade1noir"></div> -->

            <!-- <img src="./themes/TIM/images/fence.png" alt="fence-gauche" class="fence-gauche">
            <img src="./themes/TIM/images/fence.png" alt="fence-droite" class="fence-droite"> -->
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
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
                <div class="back" id="back">
                    <h3>Jeux vidéos</h3>
                    <button class="bouton_cube" id="jeux_video">
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
                <div class="right" id="right">
                    <h3>Films</h3>
                    <button class="bouton_cube" id="film">
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
                <div class="left" id="left">
                    <h3>Design</h3>
                    <button class="bouton_cube" id="design">
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
                <div class="top" id="top">
                    <h3>Web</h3>
                    <button class="bouton_cube" id="web">
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
                <div class="bottom" id="bottom">
                    <h3>Formation spécifique</h3>
                    <button class="bouton_cube" id="formation_specifique">
                        <a href="<?php echo get_template_directory_uri() . "/categories.php"?>">En savoir plus</a>
                    </button>
                </div>
            </div>

    </div>
    <!-- Ajout du cercle de scroll down en test -->
    <div class="text_cercle">
        <img class="versbas" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/fleche_flou.png" alt="">
        <div class="effetbulle">
            <svg viewBox="0 0 150 150">
                <path id="curve" d="M 75, 75 m -40, 0 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0" fill="none"></path>
                <text class="text">
                    <textPath class="text-path" href="#curve">Scroll down - Descendre - </textPath>
                </text>
            </svg>
        </div>
    </div>
    <p class="info_action">Pssst! Hey! Tournez-moi!</p>
        <div class="description_multimedia">
            <h1>Qu'est ce que le multimédia?</h1>
            <div class="espace_gauche_descmulti">
                <p>Tout le long de ta formation, tu réaliseras de nombreux projets amusants, diversifiés et stimulants qui te permettront d’explorer les multiples facettes de l’intégration multimédia.  Tu créeras notamment des jeux vidéos, sites Web, animations, modélisation 3D, vidéos, applications mobiles, environnements immersifs, applications de réalité virtuelle et augmentée, etc.</p>
                <p>Tu apprendras à concevoir et réaliser des projets numériques et interactifs tels que des jeux vidéos, sites web, modélisations 3D, animations, vidéos, application de réalité virtuelle, etc. En particulier, tu apprendras à :
                </p>
                <br>
                <div class="bulles_contenu">
                    <p>> Créer des médias (images, vidéos, sons, animations);</p>
                    <p>> Concevoir le design et l’interactivité;</p>
                    <p>> Intégrer les composantes du projet dans un tout cohérent;</p>
                    <p>> Planifier la réalisation d’un projet et en effectuer le suivi;</p>
                    <p>> Travailler en équipe;</p>
                    <p>> Préparer ton insertion professionnelle dans le milieu du travail ou à l’université.</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="evenements">
            <h2>Événements</h2>
            <div class="description_evenements hidden">
                <img src="" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque distinctio expedita sequi minus similique rem magni iste voluptatibus culpa magnam officia totam natus tenetur, doloremque quidem. Sapiente ullam excepturi dolores.</p>
            </div>
            <h2>Concours</h2>
            <div class="description_evenements hidden">
                <img src="" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat esse dolorum tempore repudiandae voluptate accusamus obcaecati cumque enim nam ipsam, nihil perferendis? Molestiae impedit autem, cum ipsum quia id pariatur.</p>
            </div>
        </div>
        <div class="bannieres">
            <h2>Mots intéressants</h2>
        </div>
        <div class="contenufunky">
            <h3>85 % des diplômés occupent un emploi ou poursuivent leurs études:</h3>
            <ul class="lespointsfunky">
                <p><b></b>&nbsp;Concepteur et Développeur de jeux vidéo;</p>
                <p><b></b>&nbsp;Développeur Web (front end et back end);</p>
                <p><b></b>&nbsp;Développeur d’applications mobiles;</p>
                <p><b></b>&nbsp;Designer / infographiste;</p>
                <p><b></b>&nbsp;Animateurs 2D / 3D;</p>
                <p><b></b>&nbsp;...et bien plus encore!</p>
            </ul>
        </div>
    </main>
    <?php get_footer();?>

        <!-- Pas touche! C'est un curseur qui est sous la souris  
    lorsque l'utilisateur est dessus le cube! -->
    <div class="hovercurseur">
        <div class="minipoint"></div>
        <img class="lesflechescurseur" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/flecheHoverCube.png" alt="">
    </div>

    <!-- API fontawsome pour les icones -->
    <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
    <!-- inclure le script qui gere les animations de scroll -->
    <script src="<?php echo get_template_directory_uri() . "/js/animations.js"?>"></script>
    <!-- inclure le script qui gere le cube 3D -->
    <script src="<?php echo get_template_directory_uri() . "/js/cube.js"?>"></script>
    <!-- inclure le script qui gere le changement de page -->
    <script src="<?php echo get_template_directory_uri() . "/js/selectionCat.js"?>"></script>
    <!-- inclure le script qui gere le curseur -->
    <script src="<?php echo get_template_directory_uri() . "/js/curseur.js"?>"></script>
</body>
</html>
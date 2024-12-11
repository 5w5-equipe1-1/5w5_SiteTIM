<!-- Entete personnaliser pour la page d'Accueil et 404 -->
<!-- /////////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="fr">
<!-- Liens et balise de tête -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/normalize.css';?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css';?>">
    <link rel="stylesheet" href="https://use.typekit.net/law8uer.css">
    <link rel="stylesheet" href="https://use.typekit.net/dnl3dwa.css">
    <link rel="icon" href="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/12/icone.png">
    <title>TIM - Accueil</title>
</head>
<!-- Partie du contenu de la page principale -->
<body>
    <header>
        <div class="conteneur_logo_tim">
        <a href="<?php echo get_home_url();?>">
            <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
        </a>
        <a href="<?php echo get_home_url();?>">
            <h2 class="TIM_entete">Techniques <br> d'intégration multimédia </span></h2>
        </a>
        </div>
        <div class="conteneur_burger_recherche">
            <!-- <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche" value name="s" id="s">
                <button type="submit" id="searchsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> -->
            <?php get_search_form(); ?>
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
        <img class="versbas" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/fleche_flou.png" alt="fleche">
        <div class="effetbulle">
            <svg viewBox="0 0 150 150">
                <path id="curve" d="M 75, 75 m -40, 0 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0" fill="none"></path>
                <text class="text">
                    <textPath class="text-path" href="#curve">Descendre ➔Descendre ➔</textPath>
                </text>
            </svg>
        </div>
    </div>
    <p class="info_action">Pssst! Hey! Tournez-moi!</p>
    <div class="conteneur_info">
        <!-- Explication du multimédia -->
        <div class="description_multimedia">
            <h1>Qu'est ce que le <span class="text_multimedia"> multimédia</span>?</h1>
            <div class="bulles_contenu">
                <p>Créer des médias</p>
                <p>Concevoir le design et l’interactivité</p>
                <p>Planifier la réalisation d’un projet et en effectuer le suivi</p>
                <p>Préparer ton insertion professionnelle dans le milieu du travail ou à l’université</p>
                <p>Travailler en équipe</p>
            </div>
        </div>

        <!-- Sections des évènements et des concours -->
        <div class="evenements">
            <!-- Décoration de dégradé -->
            <div class="commundegrade degrade1event"></div>
            <div class="lessections_infosaccueil ">
                <h2>Événements</h2>
                <?php 
                //afficher les evenements qui sont dans la base de donne WP
                    $evenement = new WP_Query(array(
                        'category_name' => 'evenements',
                        'posts_per_page' => -1 // -1 pour récupérer tous les posts
                    ));
                    while($evenement->have_posts()): $evenement->the_post();

                    $content = apply_filters('the_content', get_the_content());
                    // Extract images
                    preg_match_all('/<img[^>]+>/i', $content, $images); 
                    // Remove images from content
                    $content_without_images = preg_replace('/<img[^>]+>/i', '', $content);
                ?>
                   
                    <div class="description_evenements animation_apparait">
                        <div class="contenu_img">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo $content_without_images; ?></p>
                        </div>
                        <?php 
                            // Display images
                            if (!empty($images[0])) {
                                foreach ($images[0] as $image) {
                                    echo $image;
                                }
                            }
                        ?>
                    </div><br><br><br>
                <?php endwhile; ?>
                </div>
                <!-- Décoration de dégradé -->
            <div class="commundegrade degrade2event"></div>
            <div class="commundegrade degrade3event"></div>
            <div class="lessections_infosaccueil ">
                <h2>Concours</h2>
                <?php 
                    //afficher les concours qui sont dans la base de donne WP
                    $evenement = new WP_Query(array(
                        'category_name' => 'concours',
                        'posts_per_page' => -1 // -1 pour récupérer tous les posts
                    ));
                    while($evenement->have_posts()): $evenement->the_post();

                    $content = apply_filters('the_content', get_the_content());
                    // Extract images
                    preg_match_all('/<img[^>]+>/i', $content, $images); 
                    // Remove images from content
                    $content_without_images = preg_replace('/<img[^>]+>/i', '', $content);
                ?>
                   
                    <div class="description_evenements animation_apparait">
                        <div class="contenu_img">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo $content_without_images; ?></p>
                        </div>
                        <?php 
                            // Display images
                            if (!empty($images[0])) {
                                foreach ($images[0] as $image) {
                                    echo $image;
                                }
                            }
                        ?>
                    </div><br><br><br>
                <?php endwhile; ?>

    </div>
            </div>

        <!-- banniere -->
        <div class="bannieres" data-position="-5">
                <h2>Collaboration</h2>
                <h2>Création</h2>
                <h2>Compétences Techniques</h2>
                <!-- <h2>Intégration</h2>
                <h2>Conception</h2> -->
        </div>
        <!-- Perspective d'Avenir -->
            <div class="contenue_desc"></div> 
            <div class="contenufunky">
            <div class="commundegrade degradepoint1"></div>
            <div class="commundegrade degradepoint2"></div>
            <div class="commundegrade degradepoint3"></div>
                
                <!-- <h3 class="animation_apparait">85 % des diplômés occupent un emploi ou poursuivent leurs études.</h3> -->
                <h3 class="animation_apparait first-element">64 % des diplômés occupent un emploi lié à la formation.</h3>
                <ul class="lespointsfunky animation_apparait">
                    <div>
                        <p><b></b><span class="travail_info">Concepteur et Développeur de jeux vidéo</span></p>
                        <p><b></b><span class="travail_info">Développeur Web (front end et back end)</span></p>
                        <p><b></b><span class="travail_info">Développeur d’applications mobiles</span></p>
                    </div>
                    <div>
                        <p><b></b><span class="travail_info">Designer / infographiste</span></p>
                        <p><b></b><span class="travail_info">Animateurs 2D / 3D</span></p>
                        <p><b></b><span class="travail_info">...et bien plus encore!</span></p>
                    </div>
                    
                </ul>
                <h3 class=" barre_information second-element animation_apparait">36 % des diplômés poursuivent leurs études à l'université.</h3>
                <ul class="lespointsfunky animation_apparait">
                    <div>
                        <p><b></b><span class="travail_info">DEC-BAC en création de jeux vidéo – concentration Intégration logicielle à l’UQAT</span></p>
                        <p><b></b><span class="travail_info">Passerelle au Baccalauréat en génie des technologies de l’information à l’ÉTS (admission garantie)</span></p>
                        <p><b></b><span class="travail_info">Passerelle au Baccalauréat en génie logiciel à l’ÉTS (admission garantie)</span></p>
                    </div>
                    <div>
                        <p><b></b><span class="travail_info">Passerelle au Baccalauréat en médias interactifs à l’UQAM (5 cours crédités)</span></p>
                        <p><b></b><span class="travail_info">Passerelle au Baccalauréat en création 3D pour le cinéma à l’UQAC (NAD) à Montréal</span></p>
                        <p><b></b><span class="travail_info">Passerelle au Baccalauréat en création 3D pour le jeu vidéo à l’UQAC (NAD) à Montréal</span></p>
                    </div>
                </ul>
                <!-- Bouton inscription au SRAM  -->
                <a href="https://admission.sram.qc.ca/" class="inscription_bouton">Inscrivez-vous!</a>
            <!-- <ul class="lespointsfunky">
                <div>
                    <p><b></b>&nbsp;Concepteur et Développeur de jeux vidéo</p>
                    <p><b></b>&nbsp;Développeur Web (front end et back end)</p>
                    <p><b></b>&nbsp;Développeur d’applications mobiles</p>
                </div>
                <div>
                    <p><b></b>&nbsp;Designer / infographiste</p>
                    <p><b></b>&nbsp;Animateurs 2D / 3D</p>
                    <p><b></b>&nbsp;...et bien plus encore!</p>
                </div>
            </ul> -->
            </div>
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
    <!-- inclure le script qui gere le minicube -->
    <script src="<?php echo get_template_directory_uri() . "/js/miniCube.js"?>"></script>
    <!-- inclure le script qui gere le changement de page -->
    <script src="<?php echo get_template_directory_uri() . "/js/selectionCat.js"?>"></script>
    <!-- inclure le script qui gere le curseur -->
    <script src="<?php echo get_template_directory_uri() . "/js/curseur.js"?>"></script>
</body>
</html>
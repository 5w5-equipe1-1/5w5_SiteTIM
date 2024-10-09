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
            <img href="" src="http://localhost/5w5_ELOI/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            <?php echo get_custom_logo();?>
            <h2 class="TIM_entete">Techniques <br> d'intégration multimédia</h2>
        </div>
        <div class="conteneur_burger_recherche">
            <div class="conteneur_barre_recherche">
                <input type="text" placeholder="Rechercher..." class="text_recherche">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="conteneur_menu_gurger">
                <input type="checkbox" id="menu_gurger">
                <label for="menu_gurger">
                <div class="cube_burger"></div>
            </div>
        </div>
    </header>
    <!-- la page avec les information -->
    <main class="conteneur">

            <!-- <img src="./themes/TIM/images/fence.png" alt="fence-gauche" class="fence-gauche">
            <img src="./themes/TIM/images/fence.png" alt="fence-droite" class="fence-droite"> -->
        <div class="scene" id="scene">
            <!-- Les degradés derrière le cube -->
            <div class="testdegrade"></div>
            <div class="degrade1orange"></div>
            <div class="degrade1cyan"></div>
            <div class="degrade1magenta"></div>
            <div class="cube" id="cube">
                <div class="front" id="front">
                    <h3>3D</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
                <div class="back" id="back">
                    <h3>Jeux vidéos</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
                <div class="right" id="right">
                    <h3>Films</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
                <div class="left" id="left">
                    <h3>Design</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
                <div class="top" id="top">
                    <h3>Web</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
                <div class="bottom" id="bottom">
                    <h3>Formation spécifique</h3>
                    <button class="bouton_cube">
                        <a href="">En savoir plus</a>
                    </button>
                </div>
            </div>

    </div>
        <p class="info_action">Interactif</p>
        <div class="description_multimedia">
            <h1>Qu'est ce que le multimédia?</h1>
            <p>Tout le long de ta formation, tu réaliseras de nombreux projets amusants, diversifiés et stimulants qui te permettront d’explorer les multiples facettes de l’intégration multimédia.  Tu créeras notamment des jeux vidéos, sites Web, animations, modélisation 3D, vidéos, applications mobiles, environnements immersifs, applications de réalité virtuelle et augmentée, etc.</p>
            <p>Tu apprendras à concevoir et réaliser des projets numériques et interactifs tels que des jeux vidéos, sites web, modélisations 3D, animations, vidéos, application de réalité virtuelle, etc. En particulier, tu apprendras à :
            </p>
            <br>
            <p>> Créer des médias (images, vidéos, sons, animations);</p>
            <p>> Concevoir le design et l’interactivité;</p>
            <p>> Intégrer les composantes du projet dans un tout cohérent;</p>
            <p>> Planifier la réalisation d’un projet et en effectuer le suivi;</p>
            <p>> Travailler en équipe;</p>
            <p>> Préparer ton insertion professionnelle dans le milieu du travail ou à l’université.</p>
            <br>
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
            <h3>TITRE FUNKY</h3>
            <ul class="lespointsfunky">
                <p><b></b>&nbsp;LOREM IPSUM DOLOR</p>
                <p><b></b>&nbsp;LOREM IPSUM DOLOR</p>
                <p><b></b>&nbsp;LOREM IPSUM DOLOR</p>
                <p><b></b>&nbsp;LOREM IPSUM DOLOR</p>
                <p><b></b>&nbsp;LOREM IPSUM DOLOR</p>
            </ul>
        </div>
    </main>
    <footer>
        <div class="conteneur_logo_tim">
            <img src="http://localhost/5w5_ELOI/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            <h2 class="TIM_entete">Techniques <br>d'intégration multimédia</h2>
        </div>
        <div class="info_footer">
            <div class="colonne_footer">
                <!-- afficher les categories du site et le lien vers la page (ne pas montrer la categorie cours et projets parce qu'il n'y a pas de page lier a eux) -->
                <h3>Section 1 Titre</h3>
                <?php foreach(get_categories() as $cat):?>
                    <?php if($cat->name != "Cours" || $cat->name != "Projets"):?>
                        <p class="info_colonne_footer"><a href="">
                        <?php echo $cat->name;?></a></p>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
            <div class="colonne_footer">
                <h3>Section 2 Titre</h3>
                <p class="info_colonne_footer">faerg steg</p>
                <p class="info_colonne_footer">tg e rgtuyui</p>
                <p class="info_colonne_footer">g srtg arffaer </p>
                <p class="info_colonne_footer">sdfr fazf </p>
                <p class="info_colonne_footer">WERFT GYferg</p>
            </div>
            <div class="colonne_footer">
                <h3>Section 3 Titre</h3>
                <p class="info_colonne_footer">frcdrg err</p>
                <p class="info_colonne_footer">efer effsfdf</p>
                <p class="info_colonne_footer">thyhudvf</p>
                <p class="info_colonne_footer">sdf rfwwsdf</p>
                <p class="info_colonne_footer">thujfhsre wffff</p>
            </div>
        </div>
        <div class="droitsfooter"><p>2024-2025® Trucchosemachinchouette</p></div>
    </footer>
    <!-- API fontawsome pour les icones -->
    <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
    <!-- inclure le script qui gere les animations de scroll -->
    <script src="<?php echo get_template_directory_uri() ."/js/animations.js"?>"></script>
    <!-- inclure le script qui gere le cube 3D -->
    <script src="<?php echo get_template_directory_uri() ."/js/cube.js"?>"></script>
</body>
</html>
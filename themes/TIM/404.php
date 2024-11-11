<?php 
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    // Afficher le header
    get_header(); 

?>
   <?php 
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    // Afficher le header
    get_header(); 

?>  <main class="conteneur">

<div class="erreur">
    <h1 class="error-code">404</h1>
    <p class="error-text">Oups! Page introuvable</p><br><br><br><br>
    <a href="" class="retour">Retourner à
        la page d'accueil</a>
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

</div>


<!-- Ajout du cercle de scroll down en test 
<div class="text_cercle">
    <img class="versbas" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/fleche_flou.png"
        alt="">
    <div class="effetbulle">
        <svg viewBox="0 0 150 150">
            <path id="curve" d="M 75, 75 m -40, 0 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0" fill="none"></path>
            <text class="text">
                <textPath class="text-path" href="#curve">Scroll down - Descendre - </textPath>
            </text>
        </svg>
    </div>
</div>-->


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
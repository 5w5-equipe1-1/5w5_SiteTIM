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
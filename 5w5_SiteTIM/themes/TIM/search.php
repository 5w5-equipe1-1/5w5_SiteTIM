<?php  
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    //inclure le header
    get_header();

    //verifier si la recherche est vide
    if (isset($_GET['s'])) {
        $recherche = $_GET['s'];
        
    }

?>
        <main>
          <div class="conteneur_search">
              <div class="resultat_recherche"><h2>Votre recherche : </h2> <h2 class="recherche_text"><?php echo $recherche;?></h2></div>
                    <div>
                        <?php if(have_posts()):
                                while(have_posts()): the_post();      
                                ?>
      
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
          </div>  
        </main>
        <?php get_footer(); ?>
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
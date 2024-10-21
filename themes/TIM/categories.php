<?php 
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    get_header(); // Afficher le header

    //recupere la categorie selectionner
    if (isset($_GET['category'])) {
        $cat = $_GET['category'];
    }
?>
        <main>
            <div class="section_hero">
                <video src=""></video>
                <div class="text_hero">
                    <h1><?php echo $cat; ?></h1>
                    <h3>Sous titre</h3>
                </div>
            </div>
            <div class="galerie">
            </div>
            <div class="cours">
                <?php
                // Récupérer les posts de la catégorie
                if (have_posts()):
                    while (have_posts()): the_post();
                ?>
                        <details>
                            <summary class="summary_1"><?php the_title(); ?></summary>
                            <p class="description_cours"><?php the_content(); ?></p>
                        </details>
                    <?php endwhile;?>
                <?php endif;?>
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
        </body>
        </html>

<?php 
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    get_header(); // Afficher le header

    // Récupérer la catégorie sélectionnée
    if (isset($_GET['category'])) {
        $cat = get_category_by_slug($_GET['category']);
    }
?>
        <main>
            <div class="section_hero">
                <video src=""></video>
                <div class="text_hero">
                    <h1><?php echo esc_html($cat->name); ?></h1>
                    <h3><?php echo esc_html($cat->description); ?></h3>
                </div>
            </div>
            <div class="galerie">
            </div>
            <div class="cours">
                <?php
                // Vérifiez si la catégorie est valide
                if ($cat):
                    // Créez une nouvelle requête WP_Query pour récupérer les posts de la catégorie
                    $query = new WP_Query(array(
                        'cat' => $cat->term_id,
                        'posts_per_page' => -1 // -1 pour récupérer tous les posts
                    ));

                    // Vérifiez si la requête a des posts
                    if ($query->have_posts()):
                        while ($query->have_posts()): $query->the_post();
                ?>
                            <details>
                                <summary class="summary_1"><?php the_title(); ?></summary>
                                <p class="description_cours"><?php echo apply_filters('the_content', get_the_content()); ?></p>
                            </details>
                        <?php 
                        endwhile; 
                    endif; 
                    // Réinitialisez les données de post
                    wp_reset_postdata();
                endif; 
                ?>
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
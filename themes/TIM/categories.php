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
                <video src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/trailerTIM_V1.mp4" autoplay loop></video>
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
                    // Obtenez l'ID de la catégorie "cours"
                    $cours_cat = get_category_by_slug('cours');
                    $cours_cat_id = $cours_cat ? $cours_cat->term_id : 0;

                    // Créez une nouvelle requête WP_Query pour récupérer les posts de la catégorie et de la classe "cours"
                    $query = new WP_Query(array(
                        'category__and' => array($cat->term_id, $cours_cat_id),
                        'posts_per_page' => -1 // -1 pour récupérer tous les posts
                    ));

                    // Vérifiez si la requête a des posts
                    if ($query->have_posts()):
                        while ($query->have_posts()): $query->the_post();
                ?>
                            <details>
                                <summary class="summary_1"><?php the_title(); ?></summary>
                                <div class="description_cours">
                                    <?php echo wp_kses_post(apply_filters('the_content', get_the_content())); ?>
                                </div>
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
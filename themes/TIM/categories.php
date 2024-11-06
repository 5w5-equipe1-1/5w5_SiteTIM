<?php 
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Récupérer la catégorie sélectionnée
    require_once 'functions.php';

    get_header(); // Afficher le header

    // Récupérer la catégorie sélectionnée
    if (isset($_GET['category']) && term_exists($_GET['category'])) {
        $cat = get_category_by_slug($_GET['category']);
        if (!$cat) {
            // Rediriger vers la page 404 si la catégorie n'est pas trouvée
            require_once '404.php';
            exit;
        }
    }else{
        //amener a la page 404
        require_once '404.php';
        exit;
    }

    //Choisir la video en fonction de la catégorie
    $srcVideo = "";

    if($cat->slug == 'jeux_video'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/video-mise-en-avant-jeux_PC.mp4";
    }else if($cat->slug == 'film'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/trailer_films_PC.mp4";
    }else if($cat->slug == 'web'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/vid_web_PC.mp4";
    }else if($cat->slug == 'design'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/rendu_design_trailer2_PC.mp4";
    }else if($cat->slug == '3d'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/vid3_3D.mp4";
    }else if($cat->slug == 'formation_specifique'){
        $srcVideo = "https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/vid_formaspec.mp4";
    }
?>
        <main>
            <div class="container">
            <div class="section_hero">
                <video class="video_hero" src=<?php echo $srcVideo; ?> autoplay loop></video>
                <div class="text_hero">
                    <h1><?php echo esc_html($cat->name); ?></h1>
                    <h3><?php echo esc_html($cat->description); ?></h3>
                </div>
            </div>

            <div class="text_cercle">
                <img class="versbas" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/fleche_flou.png" alt="fleche">
                    <div class="effetbulle">
                    <svg viewBox="0 0 150 150">
                        <path id="curve" d="M 75, 75 m -40, 0 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0" fill="none"></path>
                        <text class="text">
                            <textPath class="text-path" href="#curve">Scroll down - Descendre - </textPath>
                        </text>
                    </svg>
                    </div>
            </div>

            <div class="galerie">
    <?php echo do_shortcode('[afficher_article_slug slug="3d"]'); // Exécution du shortcode ?>
</div>
            <div class="cours">
                <?php
                // Vérifiez si la catégorie est valide
                if (isset($cat)):
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
            </div>
        </main>
        <?php get_footer(); ?>

        <!-- Partie pour le curseur, ne pas enlever s.v.p -->
        <div class="hovercurseur">
            <div class="minipoint"></div>
            <img class="lesflechescurseur" src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/flecheHoverCube.png" alt="">
        </div>

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
          <!-- inclure le script du curseur -->
          <script src="<?php echo get_template_directory_uri() . "/js/curseur.js"?>"></script>
        </body>
        </html>
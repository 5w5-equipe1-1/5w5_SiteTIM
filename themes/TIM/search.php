<?php  
    // Assurez-vous que WordPress est chargé
    if (!function_exists('get_header')) {
        require_once(dirname(__FILE__) . '/../../../wp-load.php');
    }

    // Inclure le header
    get_header();

    // Vérifier si la recherche est vide
    $recherche = '';
    if (isset($_GET['s'])) {
        $recherche = sanitize_text_field($_GET['s']);
    }
?>

<main>
    <div class="conteneur_search">
        <div class="resultat_recherche">
            <h2>Votre recherche : </h2>
            <h2 class="recherche_text"><?php echo esc_html($recherche); ?></h2>
        </div>
        <div>
            <?php
            // Arguments pour WP_Query
            $args = array(
                's' => $recherche, // Le terme de recherche
            );

            // Exécuter la requête
            $query = new WP_Query($args);

            // Vérifier si des posts sont trouvés
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();      
                    // Afficher le titre et le contenu des posts
                    echo '<h3>' . get_the_title() . '</h3>';
                    echo '<div>' . get_the_excerpt() . '</div>';
                endwhile;
            else :
                echo '<p>Aucun résultat trouvé pour "' . esc_html($recherche) . '"</p>';
            endif;

            // Réinitialiser la requête
            wp_reset_postdata();
            ?>
        </div>
    </div>  
</main>
<?php get_footer(); ?>
<!-- API fontawesome pour les icones -->
<script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
<!-- Script pour les animations de scroll -->
<script src="<?php echo get_template_directory_uri() ."/js/animations.js"?>"></script>
<!-- Script pour le menu burger -->
<script src="<?php echo get_template_directory_uri() ."/js/cubeBergur.js"?>"></script>
<!-- Inclure le script qui gère le changement de page -->
<script src="<?php echo get_template_directory_uri() . "/js/selectionCat.js"?>"></script>
<!-- Inclure le script pour le carrousel -->
<script src="<?php echo get_template_directory_uri() . "/js/carrousel.js"?>"></script>
</body>
</html>
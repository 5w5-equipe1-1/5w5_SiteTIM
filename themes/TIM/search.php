<!-- Début de la page de recherche -->

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

<!-- Style et éléments HTML/PHP -->
<main>

    <div class="conteneur_search">
        <div class="resultat_recherche">
            <h2 class="recherche_titre">Résultats : </h2>
            <h2 class="recherche_text"><?php echo esc_html($recherche); ?></h2>
        </div>
        <div class="conteneur-resultat-search">
            <?php
            $category_slug = array("cours", "evenements", "concours"); // Noms des catégories à rechercher
            $categories = array_map('get_cat_ID', $category_slug); // Convertir les noms en IDs

            // Arguments pour WP_Query pour les posts dans la catégorie 'cours'
            $args = array(
                's' => $recherche, // Le terme de recherche
                'category__in' => $categories, // Filtrer par la catégorie 'cours'
                'post_type' => array('post', 'page'), // Inclure les articles et les pages
            );

            // Exécuter la requête
            $query = new WP_Query($args);

            // Vérifier si des posts sont trouvés
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();      
                    // Afficher le titre et le contenu des posts
                    echo '<h3 class="titre_r_search animation_apparait">' . get_the_title() . '</h3>';
                    echo '<div class="texte_r_search animation_apparait">' . get_the_content() . '</div>';

                    // Récupérer les images associées au post
                    $images = get_attached_media('image', $post->ID);

                    // Afficher les images
                    if ($images) {
                        echo '<div class="image_container">';
                        foreach ($images as $image) {
                            echo '<img src="' . wp_get_attachment_image_url($image->ID, 'thumbnail') . '" alt="' . $image->post_title . '">';
                        }
                        echo '</div>';
                    }
                endwhile;
            else :
                echo '<p>Aucun résultat trouvé pour "' . esc_html($recherche) . '" dans la catégorie "cours".</p>';
            endif;

            // Réinitialiser la requête
            wp_reset_postdata();
            ?>
        </div>
    </div>  
    <h3 class="texte_fin_recherche">Fin des résultats de recherches</h3>
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
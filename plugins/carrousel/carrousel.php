<?php
/*
Plugin Name: Carrousel
Description: Un plugin de carrousel pour WordPress.
Version: 1.0
Author: yannick
*/

function carrousel_enqueue() {
    wp_enqueue_style('carrousel-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('carrousel-script', plugin_dir_url(__FILE__) . 'js/carrousel.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'carrousel_enqueue');

// Création du carrousel
function afficher_carrousel($atts) {
    // Définir les attributs par défaut et récupérer les attributs passés au shortcode
    $atts = shortcode_atts(array(
        'images' => '', // Liste des URLs des images séparées par des virgules
    ), $atts, 'carrousel');

    // Convertir la liste des URLs en tableau
    $images = explode(',', $atts['images']);

    ob_start();
    ?>
    <div class="carrousel hidden">
        <div class="carrousel_images">
            <?php foreach ($images as $index => $image_url): ?>
                <div class="image carrousel_img <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
                    <img src="<?php echo esc_url(trim($image_url)); ?>" alt="Carrousel Image">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="boutton_gallerie">
            <button class="carrousel_prev">←</button>
            <button class="carrousel_next">→</button>
        </div>
    </div>
    <div class="galerie_initiale">
        <?php foreach ($images as $index => $image_url): ?>
            <div class="image_miniature">
                <img src="<?php echo esc_url(trim($image_url)); ?>" alt="Miniature Image">
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}

// Création du shortcode
function carrousel_shortcode($atts) {
    return afficher_carrousel($atts);
}
add_shortcode('carrousel', 'carrousel_shortcode');

//quoi ecrire pour utiliser le plugin
// [afficher_article_slug slug="le slug de l'article"]
?>
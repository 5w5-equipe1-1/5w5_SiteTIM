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

//creation du carrousel
function afficher_carrousel() {
    // Récupérer les images de la bibliothèque multimédia
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'posts_per_page' => -1, // Récupérer toutes les images
    );

    $images = get_posts($args);
    
    ob_start();
    ?>
    <div class="carrousel">
        <button class="carrousel_x">X</button>
        
        
        <figure class="carrousel_img">
            <?php if ($images) : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?php echo wp_get_attachment_url($image->ID); ?>" alt="<?php echo esc_attr($image->post_title); ?>" class="slide">
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucune image disponible.</p>
            <?php endif; ?>
        </figure>
        <button class="carrousel_prev">←</button>
        <button class="carrousel_next">→</button>
        <form class="carrousel_form"></form>
    </div>
    <?php
    return ob_get_clean();
}

// creation du shortcode
function carrousel_shortcode() {
    return afficher_carrousel();
}
add_shortcode('carrousel', 'carrousel_shortcode');
?>
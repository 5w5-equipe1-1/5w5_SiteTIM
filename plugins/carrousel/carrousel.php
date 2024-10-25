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
    ob_start();
    ?>
    <div class="carrousel">
        <button class="carrousel__x">X</button>
        <button class="carrousel__prev">←</button>
        <figure class="carrousel__figure"></figure>
        <button class="carrousel__next">→</button>
        <form class="carrousel__form"></form>
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
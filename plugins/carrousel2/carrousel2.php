<?php 
/*
Plugin Name: Carrousel
Description: Un plugin de carrousel pour WordPress.
Version: 2.0
Author: yannick
*/

function carrousel_enqueue() {
    wp_enqueue_style('carrousel-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('carrousel-script', plugin_dir_url(__FILE__) . 'js/carrousel.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'carrousel_enqueue');

function genere_html() {
    $contenu = '
       <div class="carrousel">
            <button class="carrousel_prev">⇦</button>
            <figure class="carrousel_figure"></figure>
            <button class="carrousel_next">⇨</button>
       </div>';
    return $contenu;
}


// Recuperer et afficher un article spécifique par son slug
function afficher_article_par_slug($atts){
    $atts = shortcode_atts(
        array(
            'slug' => '', // Slug par défaut
        ),
        $atts,
        'afficher_article_slug'
    );

    // Récupérer l'article par son slug
    $article = get_page_by_path($atts['slug'], OBJECT, 'post');

    if ($article) {
        //construction du html pour les images de la gallery
        $output = '<div>' . apply_filters('the_content', $article->post_content) . '</div>';
        //genere le html du carrousel
        $output .= genere_html();
    } else {
        //si l'article n'est pas trouvé
        $output = '<p>Aucun article trouvé</p>';
    }
    return $output;
}

//enregistrement du shortcode
add_shortcode('afficher_article_slug', 'afficher_article_par_slug');
?>    
<?php
function processCategory($category) {
    // Valider la catégorie
    if (empty($category)) {
        return "Erreur : La catégorie est vide.";
    }
    return "Selected category: " . htmlspecialchars($category);
}


function custom_search_form($form) {
    $form = '
    <form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <div class="search-container">
            <label class="screen-reader-text" for="s">Search for:</label>
            <input type="search" id="s" class="search-field" placeholder="Recherche" value="' . get_search_query() . '" name="s" />
            <button type="submit" id="searchsubmit" class="search-submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="white">
                    <path d="M10 2a8 8 0 0 1 5.29 13.71l4.42 4.42a1 1 0 0 1-1.42 1.42l-4.42-4.42A8 8 0 1 1 10 2zm0 2a6 6 0 1 0 0 12A6 6 0 0 0 10 4z"/>
                </svg>    
            </button>
        </div>
    </form>';
   
    return $form;
}
add_filter('get_search_form', 'custom_search_form');


 
 
?>
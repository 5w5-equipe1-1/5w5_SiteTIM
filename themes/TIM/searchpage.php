<!-- Section de recherche du site généré par PHP -->
 
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'TIM' ); ?></span> 'TIM' n'est peut etre pas la bonne chose -->
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'your-theme-text-domain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'your-theme-text-domain' ); ?></button>
</form>
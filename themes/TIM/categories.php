<?php 
    /* Template Name: categories Page */
    get_header(); //afficher le header

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category = $_POST['category'];
    }
    
    //verifier si la categorie existe
    if($category){ 
        $_nomCat = $category->name; //recuperer le nom de la categorie
    }
?>
    <main>
        <div class="section_hero">
            <video src=""></video>
            <div class="text_hero">
                <h1><?php echo $_nomCat; ?></h1>
                <h3>Sous titre</h3>
            </div>
        </div>
        <div class="galerie">
        </div>
        <div class="cours">
            <?php
            //recuperer les posts de la categorie 3D
            if(have_posts()):
                while(have_posts()):the_post();
            ?>
                    <details>
                        <summary class="summary_1"><?php the_title(); ?></summary>
                        <p class="description_cours"><?php get_the_content(); ?></p>
                    </details>
                <?php endwhile;?>
            <?php endif;?>
            
        </div>
    </main>
    <?php get_footer();?>
    <!-- API fontawsome pour les icones -->
    <script src="https://kit.fontawesome.com/a189675535.js" crossorigin="anonymous"></script>
    <!-- Script pour les animations de scroll -->
    <script src="<?php echo get_template_directory_uri() ."/js/animations.js"?>"></script>
    <!-- Script pour le menu burger -->
    <script src="<?php echo get_template_directory_uri() ."/js/cubeBergur.js"?>"></script>
</body>
</html>
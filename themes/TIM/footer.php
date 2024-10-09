<footer>
        <div class="conteneur_logo_tim">
            <img src="http://localhost/5w5_ELOI/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            <h2 class="TIM_entete">Techniques <br>d'intégration multimédia</h2>
        </div>
        <div class="info_footer">
            <div class="colonne_footer">
                <!-- afficher les categories du site et le lien vers la page (ne pas montrer la categorie cours et projets parce qu'il n'y a pas de page lier a eux) -->
                <h3>Section 1 Titre</h3>
                <?php foreach(get_categories() as $cat):?>
                    <?php if($cat->name != "Cours" || $cat->name != "Projets"):?>
                        <p class="info_colonne_footer"><a href="<?php echo get_template_directory_uri() . "/3d.php"?>">
                        <?php echo $cat->name;?></a></p>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
            <div class="colonne_footer">
                <h3>Section 2 Titre</h3>
                <p class="info_colonne_footer">faerg steg</p>
                <p class="info_colonne_footer">tg e rgtuyui</p>
                <p class="info_colonne_footer">g srtg arffaer </p>
                <p class="info_colonne_footer">sdfr fazf </p>
                <p class="info_colonne_footer">WERFT GYferg</p>
            </div>
            <div class="colonne_footer">
                <h3>Section 3 Titre</h3>
                <p class="info_colonne_footer">frcdrg err</p>
                <p class="info_colonne_footer">efer effsfdf</p>
                <p class="info_colonne_footer">thyhudvf</p>
                <p class="info_colonne_footer">sdf rfwwsdf</p>
                <p class="info_colonne_footer">thujfhsre wffff</p>
            </div>
        </div>
        <div class="droitsfooter"><p>2024-2025® Trucchosemachinchouette</p></div>
    </footer>

    
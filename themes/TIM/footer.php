<footer>
        <div class="conteneur_logo_tim">
            <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            <h2 class="TIM_entete">Techniques <br>d'intégration multimédia</h2>
        </div>
        <div class="info_footer">
            <div class="colonne_footer">
                <!-- afficher les categories du site et le lien vers la page (ne pas montrer la categorie cours et projets parce qu'il n'y a pas de page lier a eux) -->
                <h3>Cours</h3>
                <?php foreach(get_categories() as $cat):?>
                    <?php if($cat->name != "Cours" || $cat->name != "Projets"):?> <!--Marche pas-->
                    <p class="info_colonne_footer"><a class="bouton_cube" id="<?php echo $cat->name; ?>" href="<?php echo get_template_directory_uri() . "/categories.php"?>">
                        <?php echo $cat->name;?></a></p>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
            <div class="colonne_footer">
                <h3>Coorrdonnées</h3>
                <p class="info_colonne_footer">3800, rue Sherbrooke Est</p>
                <p class="info_colonne_footer">Montréal (Québec) H1X 2A2</p>
                <p class="info_colonne_footer">(514) 254-7131</p>
                <p class="info_colonne_footer">sdfr fazf </p>
                <p class="info_colonne_footer">WERFT GYferg</p>
            </div>
            <div class="colonne_footer">
                <h3>Réalisé par</h3>
                <p class="info_colonne_footer">Gabrielle Pelletier</p>
                <p class="info_colonne_footer">Eloi Chayer</p>
                <p class="info_colonne_footer">Salma Bourakkadi Zarrouki</p>
                <p class="info_colonne_footer">Yannick Bastien</p>
                <p class="info_colonne_footer">Syphax Mokraoui</p>
            </div>
        </div>
        <div class="droitsfooter"><p>2024-2025® Collège de Maisonneuve | Programme TIM, tous droits réservés.</p></div>
    </footer>

    
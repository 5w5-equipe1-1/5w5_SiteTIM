<!-- PARTIE DU FOOTER - CHERCHER EN PHP -->
<!-- //////////////////////////////////////// -->

<footer>
<!-- Montagne -->
    <div class="section_montagne">
        <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/11/test_separation.png" alt="fond_montagne">
    </div>

<!-- Ajout du cube décoratif -->
    <div class="cube_container">
      <div class="minicube">
        <div class="face devant_cube"></div>
        <div class="face derriere_cube"></div>
        <div class="face gauche_cube"></div>
        <div class="face droite_cube"></div>
        <div class="face haut_cube"></div>
        <div class="face bas_cube"></div>
      </div>
    </div>

    <!-- Un autre dégradé, ben oui! -->
    <div class="degrade_blanc"></div>

    <!-- Contenu du footer -->
        <div class="conteneur_logo_tim">
            <img src="https://gftnth00.mywhc.ca/tim23/wp-content/uploads/2024/10/tim.png" alt="Logo TIM" class="logo_tim">
            <h2 class="TIM_entete">Techniques <br>d'intégration multimédia</h2>
        </div>
        <!-- Section des infos du site -->
        <div class="info_footer">
            <div class="colonne_footer">
                <!-- afficher les categories du site et le lien vers la page (ne pas montrer la categorie cours et projets parce qu'il n'y a pas de page lier a eux) -->
                <h3>Cours</h3>
                <?php foreach(get_categories() as $cat):?>
                    <?php if($cat->slug != "cours" && $cat->slug != "projets" && $cat->slug != "non-classe" && $cat->slug != "evenements" && $cat->slug != "concours"):?> <!--Marche pas (ne dois pas afficher dans le footer le mot projet et cours--> <!-- Marche pour Gaby-->
                    <p class="info_colonne_footer"><a class="bouton_footer" id="<?php echo $cat->slug; ?>" href="<?php echo get_template_directory_uri() . "/categories.php"?>">
                        <?php echo $cat->name;?></a></p>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
            <!-- information supplementaire -->
            <div class="colonne_footer">
                <h3>Contenu</h3>
                <p class="info_colonne_footer"><a href="">À propos</a></p>
                <p class="info_colonne_footer"><a href="">Plus d'infos</a></p>
                <p class="info_colonne_footer"><a href="">Foire aux questions</a></p>
                <p class="info_colonne_footer"><a href="https://www.cmaisonneuve.qc.ca/">Collège de Maisonneuve</a></p>
                <p class="info_colonne_footer"><a href="">Nous rejoindre</a></p>
            </div>
            <!-- credit -->
            <div class="colonne_footer">
                <h3>Créateurs</h3>
                <p class="info_colonne_footer magenta">Eloi Yuri Chayer</p>
                <p class="info_colonne_footer orange">Yannick Bastien</p>
                <p class="info_colonne_footer orange">Gabrielle Pelletier</p>
                <p class="info_colonne_footer cyan">Syphax Mokraoui</p>
                <p class="info_colonne_footer cyan">Salma Bourakkadi Zarrouki</p>
            </div>
        </div>

        <!-- Section des médias et des réseaux sociaux -->
        <div class="les_reseaux">
            <!-- <h3>Suivez-nous</h3> -->
            <div class="lesmedias">
                <p class="info_colonne_footer"><a href="https://www.facebook.com/maisonneuvetim"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0,0,256,256">
                    <g fill="var(--couleur-test-cyan)" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM37,19h-2c-2.14,0 -3,0.5 -3,2v3h5l-1,5h-4v15h-5v-15h-4v-5h4v-3c0,-4 2,-7 6,-7c2.9,0 4,1 4,1z"></path></g></g>
                    </svg></a></p>
                <p class="info_colonne_footer"><a href="https://www.instagram.com/collegemaisonneuve/"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0,0,256,256">
                    <g fill="var(--couleur-test-orange)" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z"></path></g></g>
                    </svg></a></p>
                <p class="info_colonne_footer"><a href="https://www.youtube.com/@TIMaisonneuve/featured"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0,0,256,256">
                    <g fill="var(--couleur-test-magenta)" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M44.89844,14.5c-0.39844,-2.19922 -2.29687,-3.80078 -4.5,-4.30078c-3.29687,-0.69922 -9.39844,-1.19922 -16,-1.19922c-6.59766,0 -12.79687,0.5 -16.09766,1.19922c-2.19922,0.5 -4.10156,2 -4.5,4.30078c-0.40234,2.5 -0.80078,6 -0.80078,10.5c0,4.5 0.39844,8 0.89844,10.5c0.40234,2.19922 2.30078,3.80078 4.5,4.30078c3.5,0.69922 9.5,1.19922 16.10156,1.19922c6.60156,0 12.60156,-0.5 16.10156,-1.19922c2.19922,-0.5 4.09766,-2 4.5,-4.30078c0.39844,-2.5 0.89844,-6.10156 1,-10.5c-0.20312,-4.5 -0.70312,-8 -1.20312,-10.5zM19,32v-14l12.19922,7z"></path></g></g>
                    </svg></a></p>
                <p class="info_colonne_footer"><a href="https://x.com/CdeMaisonneuve"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0,0,256,256">
                    <g fill="var(--couleur-test-orange)" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M11,4c-3.866,0 -7,3.134 -7,7v28c0,3.866 3.134,7 7,7h28c3.866,0 7,-3.134 7,-7v-28c0,-3.866 -3.134,-7 -7,-7zM13.08594,13h7.9375l5.63672,8.00977l6.83984,-8.00977h2.5l-8.21094,9.61328l10.125,14.38672h-7.93555l-6.54102,-9.29297l-7.9375,9.29297h-2.5l9.30859,-10.89648zM16.91406,15l14.10742,20h3.06445l-14.10742,-20z"></path></g></g>
                    </svg></a></p>
                <p class="info_colonne_footer"><a href="http://ca.linkedin.com/company/collegedemaisonneuve"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0,0,256,256">
                    <g fill="var(--couleur-test-cyan)" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM17,20v19h-6v-19zM11,14.47c0,-1.4 1.2,-2.47 3,-2.47c1.8,0 2.93,1.07 3,2.47c0,1.4 -1.12,2.53 -3,2.53c-1.8,0 -3,-1.13 -3,-2.53zM39,39h-6c0,0 0,-9.26 0,-10c0,-2 -1,-4 -3.5,-4.04h-0.08c-2.42,0 -3.42,2.06 -3.42,4.04c0,0.91 0,10 0,10h-6v-19h6v2.56c0,0 1.93,-2.56 5.81,-2.56c3.97,0 7.19,2.73 7.19,8.26z"></path></g></g>
                    </svg></a></p>
            </div>
        </div>
        <div class="droitsfooter"><p>2024-2025® | Collège de Maisonneuve | Programme TIM. tous droits réservés.</p></div>
    </footer>

    
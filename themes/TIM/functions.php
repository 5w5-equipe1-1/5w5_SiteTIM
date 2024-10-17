<?php
function processCategory($category) {
    // Valider la catégorie
    if (empty($category)) {
        return "Erreur : La catégorie est vide.";
    }
    return "Selected category: " . htmlspecialchars($category);
}
?>
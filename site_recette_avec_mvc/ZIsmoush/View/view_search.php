<?php
function displaySearchResults($recipes) {
    echo '<h1>Résultats de la recherche</h1>';
    echo '<ul>';
    foreach ($recipes as $recipe) {
        echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
    }
    echo '</ul>';
}

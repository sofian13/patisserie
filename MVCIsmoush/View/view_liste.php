<?php
function displayRecipesList($recipes) {
    echo '<ul>';
    foreach ($recipes as $recipe) {
        echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
    }
    echo '</ul>';
}

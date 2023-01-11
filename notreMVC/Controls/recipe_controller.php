<?php

require 'notreMVC/Model/model.php';
require 'notreMVC/View/detail.php';
require 'notreMVC/View/view_liste.php';
require 'notreMVC/View/view_search.php';


if (isset($_GET['id'])) {
    $recipe = getRecipeById($_GET['id']);
    if ($recipe) {
        displayRecipeDetails($recipe);
    } else {
        echo 'Recette non trouvée';
    }
} elseif (isset($_GET['query'])) {
    $recipes = searchRecipes($_GET['query']);
    if (count($recipes) > 0) {
        displaySearchResults($recipes);
    } else {
        echo 'Aucun résultat trouvé';
    }
} else {
    $recipes = getAllRecipes();
    displayRecipesList($recipes);
}

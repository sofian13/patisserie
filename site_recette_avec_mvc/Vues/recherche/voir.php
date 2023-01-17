 <!-- Formulaire de recherche -->
 <form method="get" action="index.php?url=Recherche/searchRecipes">
    <input type="text" name="query" placeholder="Rechercher une recette">
    <input type="submit" value="Rechercher">
</form>

<?php 

$recherche = new Recherche();
if(isset($_GET['query'])){
    $query = $_GET['query'];
    $recipes = $recherche->searchRecipes($query);
    foreach ($recipes as $recipe) {
        echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
    }
}
?>

<?php

final class ControleurRecherche
{
    public function defautAction()
    {
        $O_recherche =  new Recherche();
        Vue::montrer('recherche/voir', array('Recherche' =>  $O_recherche->donneMessage()));

    }

        //Fonction de recherche des recettes
    public function searchRecipes($query) {
        $host = 'mysql-thesavorist.alwaysdata.net  ';
        $dbname = 'thesavorist_site';
        $username = '295285';
        $password = '*OnadesnotesIncr13*';

        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $this->$db->prepare("SELECT id, nom FROM recettes WHERE nom LIKE '%$query%'");
        $stmt->execute();
        return $stmt->fetchAll();
    }


}

$recherche = new Recherche();
if(isset($_GET['query'])){
    $query = $_GET['query'];
    $recipes = $recherche->searchRecipes($query);
    foreach ($recipes as $recipe) {
        echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
    }
}
?>

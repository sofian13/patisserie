<!DOCTYPE html>
<html>
<head>
  <title>Recherche</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Recherche</h1>
    <?php
        // Connexion à la base de données
        $host = 'mysql-thesavorist.alwaysdata.net  ';
        $dbname = 'thesavorist';
        $username = '295285';
        $password = '*OnadesnotesIncr13*';

        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Récupération des recettes
        $query = $_GET['query'];
        $stmt = $db->prepare("SELECT id, nom FROM recettes WHERE nom LIKE '%$query%'");
        $stmt->execute();
        $recipes = $stmt->fetchAll();

        // Affichage des recettes
        foreach ($recipes as $recipe) {
            echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
        }
    ?>
</body>    
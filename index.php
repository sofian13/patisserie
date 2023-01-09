<!-- Page HTML pour afficher une liste de recettes -->
<!DOCTYPE html>
<html>
<head>
  <title>Recettes de pâtisserie</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Recettes de pâtisserie</h1>

  <!-- Formulaire de recherche -->
  <form method="get" action="search.php">
    <input type="text" name="query" placeholder="Rechercher une recette">
    <input type="submit" value="Rechercher">
  </form>

  <!-- Liste de recettes -->
  <ul>
    <?php
    // Connexion à la base de données et récupération des recettes
    $db = new PDO('mysql:host=localhost;dbname=thesavorist', '295285', '*OnadesnotesIncr13*');
    $stmt = $db->prepare('SELECT id, nom FROM recettes');
    $stmt->execute();
    $recipes = $stmt->fetchAll();

    // Affichage des recettes
    foreach ($recipes as $recipe) {
      echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
    }
    ?>
  </ul>
</body>
</html>

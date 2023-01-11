<!-- Page HTML pour afficher une liste de recettes -->
<!DOCTYPE html>
<html>
<head>
  <title>TheSavorist</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>The Savorist</h1>

  <!-- Formulaire de recherche -->
  <form method="get" action="search.php">
    <input type="text" name="query" placeholder="Rechercher une recette">
    <input type="submit" value="Rechercher">
  </form>

    <!-- Bouton de connexion -->
    <div id="login-button">
    <a href="Connexion/login.html">Connexion</a>
  </div>

  <!-- Liste de recettes -->
  <ul>
  <?php
  // Connexion à la base de données
  $host = 'mysql-thesavorist.alwaysdata.net';
  $dbname = 'thesavorist';
  $username = '295285';
  $password = '*OnadesnotesIncr13*';

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Récupération des recettes
  $stmt = $db->prepare('SELECT id, nom FROM recettes');
  $stmt->execute();
  $recipes = $stmt->fetchAll();

  // Affichage des recettes
  foreach ($recipes as $recipe) {
    echo '<li><a href="recipe.php?id=' . $recipe['id'] . '">' . $recipe['nom'] . '</a></li>';
  }
} catch (PDOException $e) {
  echo 'Erreur de connexion : ' . $e->getMessage();
}

    ?>
  </ul>
</body>
</html>

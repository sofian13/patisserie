<!-- Page HTML pour afficher les détails d'une recette -->
<!DOCTYPE html>
<html>
<head>
  <title>Détails de la recette</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    // Connexion à la base de données
  $host = 'mysql-thesavorist.alwaysdata.net  ';
  $dbname = 'thesavorist_site';
  $username = '295285';
  $password = '*OnadesnotesIncr13*';

  // Connexion à la base de données et récupération de la recette
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $stmt = $db->prepare('SELECT * FROM recettes WHERE id = :id');
  $stmt->execute(array(':id' => $_GET['id']));
  $recipe = $stmt->fetch();
/*
  // Affichage des détails de la recette
  echo '<h1>' . $recipe['nom'] . '</h1>';
  echo '<img src="' . $recipe['image'] . '" alt="' . $recipe['nom'] . '">';
  echo '<p>Temps de préparation: ' . $recipe['prep_time'] . '</p>';
  echo '<p>Difficulté: ' . $recipe['difficulty'] . '</p>';
  echo '<p>Coût: ' . $recipe['cost'] . '</p>';
  echo '<h2>Ingrédients</h2>';
  echo '<ul>';
  $ingredients = explode(',', $recipe['ingredients']);
  foreach ($ingredients as $ingredient) {
    echo '<li>' . $ingredient . '</li>';
  }
  echo '</ul>';
  echo '<h2>Ustensiles</h2>';
  echo '<ul>';
  $tools = explode(',', $recipe['tools']);
  foreach ($tools as $tool) {
    echo '<li>' . $tool . '</li>';
  }
  echo '</ul>';
  echo '<h2>Préparation</h2>';
  echo '<p>' . $recipe['description'] . '</p>'; 
  */
  ?>
</body>
</html>

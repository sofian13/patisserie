<<<<<<< HEAD
<?php
// Ce fichier est le point d'entrée de votre application

    require 'Noyau/ChargementAuto.php';
    /*
     url pour notre premier test MVC Hello World,
     nous n'avons pas d'action précisée on visera celle par défaut
     /index.php?ctrl=helloworld
     /helloworld
     /controleur/nom_action/whatever/whatever2/

    */
/*
    $S_controleur = isset($_GET['ctrl']) ? $_GET['ctrl'] : null;
    $S_action = isset($_GET['action']) ? $_GET['action'] : null;

    Vue::ouvrirTampon(); //  /Noyau/Vue.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    $O_controleur = new Controleur($S_controleur, $S_action);
*/

    $S_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
    $A_postParams = isset($_POST) ? $_POST : null;

    Vue::ouvrirTampon(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

    try
    {
        $O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
        $O_controleur->executer();
    }
    catch (ControleurException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    $contenuPourAffichage = Vue::recupererContenuTampon();

    // On affiche le contenu dans la partie body du gabarit général
    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));
=======
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
  $dbname = 'thesavorist_site';
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
>>>>>>> 52fa9b8878250f9faaef64722b633accb497161c

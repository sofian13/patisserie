<nav>
<div class="formRecherche">
    <!-- Formulaire de recherche -->
    <form method="get" action="index.php?url=Recherche" id="form">
        <input type="text" name="query" placeholder="Rechercher une recette">
        <input type="text" name="url" value="Recherche" id="url1">
        <input type="submit" value="Rechercher" form="form">
    </form>
</div>
<div class="formTri">
    <div class="formTri1">
        <form action="index.php?url=Tri" method="get">
            <input type="submit" name="sortCout" value="Trier par coût">
            <input type="text" name="url" value="Tri" id="url2">
        </form>
    </div>
    <div class="formTri2">
        <form action="index.php?url=Tri" method="get">
            <input type="submit" name="sortDifficulte" value="Trier par difficulte">
            <input type="text" name="url" value="Tri" id="url3">
        </form>
    </div>
</div>



<div class="divInput">
<?php if (isset($_SESSION['userAdmin'])) {
  echo'<input type="button" value="Créer recette" onclick="versCreation()" class="btnConnexion">';
}?>
  <input type="button" value="Connexion" onclick="openLoginPage()" class="btnConnexion">
  <input type="button" value="Admin" onclick="versAdmin()" class="btnConnexion">
</div>
</nav>
<div class="cards">
    <?php

if(isset($_GET['query'])){
   $recipes = $A_vue['recherche'];
}
else if((isset($_GET['sortCout']))) {
  $recipes = $A_vue['triCout']; // afficher les recettes triées ici
}else if((isset($_GET['sortDifficulte']))) {
  $recipes = $A_vue['triDifficulte']; // afficher les recettes triées ici
}else {
  $recipes = $A_vue['recipes'];
  }
?>
<h1>Bienvenue chez the Savorist !</h1> <br><br><br>
  <?php foreach ($recipes as $recipe) {
    echo '<div class="card" data-id="' . $recipe['id'] . '">
                <div class="card__image-holder">
                    <img class="card__image" src ="data:image/jpeg;base64,' . base64_encode($recipe['image']) . '" alt = "wave"/></div>
<div class = "card-title">';
    if ($_SESSION['userAdmin']) {
      echo '<a  class="toggle-info btn">
    <span class="left"></span>
    <span class="right"></span>
  </a>';
    }
    echo '<h2>' . $recipe['nom'] . '</h2>
</div>
<div class ="card-flap flap-1">
  <div class="card-description">' . $recipe['liste_particularite'] . '</div>
  <div class = "card-flap flap2">
    <div class = "card-actions">
        <a href ="#" class="btns">Read more</a>
    </div>
  </div>
  </div>
</div>';
  }
  ?>
</div>

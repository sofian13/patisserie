<div class="formRecherche">
<!-- Formulaire de recherche -->
 <form method="get" action="index.php?url=Recherche" id = "form">
    <input type="text" name="query" placeholder="Rechercher une recette">
    <input type="text" name="url" value="Recherche" id="url">
    <input type="submit" value="Rechercher" form ="form">
</form>
</div>


<div class="divInput">
    <input type="button" value="Connexion" onclick="versConnexion()" class="btnConnexion">
</div>

<div class="cards">
<?php

if(isset($_GET['query'])){
   $recipes = $A_vue['recherche'];
}
else {
  $recipes = $A_vue['recipes'];
  }

  foreach ($recipes as $recipe) {
    echo '<div class="card" data-id="' . $recipe['id'] . '">
                <div class="card__image-holder">
                    <img class="card__image" src ="data:image/jpeg;base64,' . base64_encode($recipe['image']) . '" alt = "wave"/></div>
<div class = "card-title">';
    
      echo '<a href = "/admin/checkAdmin" class="toggle-info btn">
    <span class="left"></span>
    <span class="right"></span>
  </a>';

    
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
<body>
  <form action="index.php?url=recette/ajoute_recette" class="form" method="POST">
    <div class="action">
      <span class="load show" id="login-action" onclick="openLoginPage()">Création recette</span>



    </div>
    </div>
    <div class="login show-page">

      <input type="text" name="nom" placeholder="Nom de la recette" required />
      <input type="text" name="ingredient" placeholder="Ingrédients" required/>
      <input type="text" name="instruction" placeholder="Instructions" required/>
      <input type="text" name="liste_ingredient" placeholder="Liste ingrédient"required />
      <input type="text" name="liste_ustensile" placeholder="liste-ustensile" required/>
      <input type="text" name="temps" placeholder="temps de préparation" required/>
      <input type="text" name="cout" placeholder="coût" required/>
      <button name="recette">Création de la recette</button>

    </div>


  </form>
</body>

</html>
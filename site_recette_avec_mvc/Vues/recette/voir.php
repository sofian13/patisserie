<body>

  <form enctype="multipart/form-data" action="index.php?url=recette/ajoute_recette" class="form" method="POST">
    <div class="action">
      <span class="load show" id="login-action" onclick="openLoginPage()">Création recette</span>



    </div>
    <div class="login show-page">
      <div class="avatar-input">
        <input type="file" name="avatar" id="avatar" accept="image/*">
        <label for="avatar">Photo de votre recette</label>
        <img src="https://media.discordapp.net/attachments/885515822817234954/1063397423428403230/pngegg.png?width=581&height=581" id="avatar-preview" alt="avatar">
        <input type="text" name="nom" placeholder="Nom de la recette" required />
        <input type="text" name="ingredient" placeholder="Ingrédients" required />
        <input type="text" name="instruction" placeholder="Instructions" required />
        <input type="text" name="liste_ingredient" placeholder="Liste ingrédient" required />
        <input type="text" name="liste_ustensile" placeholder="liste-ustensile" required />
        <input type="text" name="temps" placeholder="temps de préparation" required />
        <input type="text" name="difficulte" placeholder="Difficulté de votre recette" required />
        <input type="text" name="particularite" placeholder="Particularité de votre recette" required />
        <input type="text" name="cout" placeholder="coût" required />
        <button name="recette">Création de la recette</button>
      </div>

    </div>


  </form>

</body>
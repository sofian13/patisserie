<div id="pageInscription">
    <form enctype="multipart/form-data" method="post" class="form" action="index.php?url=inscription/ajoute_utilisateur">

    <div class="action">
        <span class="load" id="login-action" onclick="openLoginPage()">
            Connexion
        </span>
        <span class="load show" onclick="openRegPage()" id="reg-action">
            Inscription
        </span>
      </div>
        <div class="reg">
          <div class="avatar-input">
              <input type="file" name="avatar" id="avatar" accept="image/*">
              <label for="avatar">Choisissez un avatar</label>
              <img src="https://media.discordapp.net/attachments/885515822817234954/1063397423428403230/pngegg.png?width=581&height=581" id="avatar-preview" alt="avatar">
              <input type="text" placeholder="Pseudo" name="pseudo"/>
              <input type="email" placeholder="Email" name="email"/>
              <input type="password" placeholder="Mot de passe" name="mdp" id="mdp"/>
              <input type="password" placeholder="Confirmer Mot de passe" name="mdpverif"/>
              <button name="inscription">Inscription</button>
              <a href="#" onclick="openLoginPage()">Connexion</a>
          </div>
      </div>
    </form>
    <button onclick="openMdp()" name="btn">Mot de passe oublié</button>
</div>




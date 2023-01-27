<div id="pageConnexion">
    <form method="post" class="form" action="/connexion/connexion">
      <div class="action">
        <span class="load show" id="login-action" onclick="openLoginPage()">
            Connexion
        </span>
        <span class="load" onclick="openRegPage()" id="reg-action">
            Inscription
        </span>
      </div>

      <div class="login show-page">
        <input type="text" placeholder="Pseudo" name="pseudo" required/>
        <input type="password" placeholder="Mot de passe" name="mdp" required/>
        <button>Connexion</button>
        <a href="#" onclick="openRegPage()">Inscription</a>
      </div>
    </form>
    <button onclick="openMdp()" name="btn">Mot de passe oublié</button>
</div>




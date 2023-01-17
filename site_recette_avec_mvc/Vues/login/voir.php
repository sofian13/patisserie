<html id="pageConnexion">
  <body>
    <form action="" class="form" action="index.php?url=login">
      <div class="action">
        <span class="load show" id="login-action" onclick="openLoginPage()">
            Connexion
        </span>
        <span class="load" onclick="openRegPage()" id="reg-action">
            Inscription
        </span>
      </div>

      <div class="login show-page">
        <input type="text" placeholder="Pseudo" />
        <input type="password" placeholder="Mot de passe" />
        <button>Connexion</button>
        <a href="#" onclick="openRegPage()">Inscription</a>
      </div>
    </form>
  </body>
</html>



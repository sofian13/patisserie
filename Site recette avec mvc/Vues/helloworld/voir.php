
  <body>
    <form action="" class="form">
      <div class="action">
        <span class="load show" id="login-action" onclick="openLoginPage()"
          >Connexion</span
        >
        <span class="load" onclick="openRegPage()" id="reg-action"
          >Inscription</span
        >
      </div>
      <div class="login show-page">
        <input type="text" placeholder="Pseudo" />
        <input type="password" placeholder="Mot de passe" />
        <button>Connexion</button>
        <a href="#" onclick="openRegPage()">Inscription</a>
      </div>
      <div class="reg">
        <input type="text" placeholder="Pseudo" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Mot de passe" />
        <button>Inscription</button>
        <a href="#" onclick="openLoginPage()">Connexion</a>
      </div>
    </form>
  </body>
  <script src="script.js"  ></script>  
</html>



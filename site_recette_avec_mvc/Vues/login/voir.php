
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
      </div>
      <div class="login show-page">
        <input type="text" placeholder="Pseudo" />
        <input type="password" placeholder="Mot de passe" />
        <button>Connexion</button>
        <a href="#" onclick="openRegPage()">Inscription</a>
      </div>
  <form class="form">
      <div class="reg">
        <div class="avatar-input">
          <input type="file" name="avatar" id="avatar" accept="image/*">
          <label for="avatar">Choose an avatar</label>
          <img src="https://media.discordapp.net/attachments/885515822817234954/1063397423428403230/pngegg.png?width=581&height=581" id="avatar-preview" alt="avatar">
          <input type="text" placeholder="Pseudo" />
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Mot de passe" />
          <input type="password" placeholder="Confirmer Mot de passe" />
          <button>Inscription</button>
          <a href="#" onclick="openLoginPage()">Connexion</a>
        </div>
      </div>
    </form>

  </form>
  </body>
  <script src="script.js"  ></script>  
</html>



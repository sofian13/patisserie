<?php

final class ControleurLogin
{
    public function defautAction()
    {
        $O_login =  new Login();
        Vue::montrer('login/voir', array('Login' =>  $O_login->donneMessage()));
    }

    public function connexionAction() {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        $O_connexion = new Login();

        $O_connexion->connexion($pseudo,$mdp);
    }
}
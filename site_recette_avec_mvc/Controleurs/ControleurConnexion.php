<?php

final class ControleurConnexion
{
    public function defautAction()
    {
        $O_login =  new Connexion();
        Vue::montrer('Connexion/voir');
    }

    public function connexionAction() {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        $O_connexion = new Connexion();

        $O_connexion->connexion_bd($pseudo,$mdp);

    }
}
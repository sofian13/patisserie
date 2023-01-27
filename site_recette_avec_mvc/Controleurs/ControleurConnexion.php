<?php

final class ControleurConnexion
{
    public function defautAction()
    {
        $O_login =  new Connexion();
        Vue::montrer('Connexion/voir');
    }

    public function connexionAction(array $urlParameters, array $postParameters) {
        $pseudo = $postParameters['pseudo'];
        $mdp = $postParameters['mdp'];
        if ($pseudo === NULL || $mdp === NULL) header('Location:/index.php?url=connexion');
        $O_connexion = new Connexion();

        $O_connexion->connexion_bd($pseudo,$mdp);
    }
}
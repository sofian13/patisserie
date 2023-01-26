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

        $O_connexion = new Connexion();

        $O_connexion->connexion_bd($pseudo,$mdp);

        $to = 'qzpnvr@gmail.com';

        $subject = 'Hola';

        $message = 'This is a test email.';

        mail($to, $subject, $message);
    }
}
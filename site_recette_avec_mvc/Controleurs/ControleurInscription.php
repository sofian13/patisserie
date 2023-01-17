<?php

class ControleurInscription
{
    public function defautAction()
    {
        $O_bdd = new inscription();

        Vue::montrer('inscription/voir', array('inscription' =>  $O_bdd->donneMessage()));
    }

    public function ajoute_utilisateurAction() {

        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];

        $O_bdd = new inscription();

        $O_bdd ->ajoute_utilisateur($pseudo,$mdp,$email);
    }
}
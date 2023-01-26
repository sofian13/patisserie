<?php

final class Connexion
{

    public function connexion_bd($pseudo, $mdp)
    {
        $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $O_bdd->prepare('SELECT * FROM utilisateurs WHERE nom = ?');
        while(!$req->execute(array($pseudo))) {
            $req->execute(array($pseudo));
        }
        $utilisateur = $req ->fetch();

        if ($utilisateur && password_verify($mdp, $utilisateur["password"])) {
            header('Location:/index.php');
            exit;
        }
    }
}

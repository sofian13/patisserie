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
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['userAdmin'] = false;
        $utilisateur = $req ->fetch();

        if ($utilisateur && password_verify($mdp, $utilisateur["password"])) {
            session_start();
            $_SESSION['utilisateur'] = $pseudo;
            header('Location:/index.php');
            exit;
        }
    }

    
}

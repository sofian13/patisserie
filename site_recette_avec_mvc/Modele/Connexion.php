<?php

final class Connexion
{

    public function connexion_bd($pseudo, $mdp)
    {
        $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $O_bdd->prepare('SELECT photo,password FROM utilisateurs WHERE nom = ?');
        while(!$req->execute(array($pseudo))) {
            $req->execute(array($pseudo));
        }

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['userAdmin'] = false;
        $utilisateur = $req ->fetch();

        if ($utilisateur && password_verify($mdp, $utilisateur["password"])) {
            session_start();

            $req = $O_bdd->prepare('UPDATE utilisateurs SET date_derniere_connexion = ? WHERE nom = ?');
            $date = date('y-m-d h:i:s');
            while(!$req->execute(array($date,$pseudo))) {
                $req->execute(array($date,$pseudo));
            }

            $_SESSION['utilisateur'] = $pseudo;
            $_SESSION['utilisateur_pp'] = $utilisateur["photo"];
            header('Location:/index.php');
            exit;
        }
        else {
            echo "Identfiants pas correspondant.";
            echo $utilisateur["password"];
            echo $mdp;
            var_dump (password_verify($mdp, $utilisateur["password"]));
        }
    }

    
}

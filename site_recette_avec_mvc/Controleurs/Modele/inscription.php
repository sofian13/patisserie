<?php

final class inscription {

    public function ajoute_utilisateur($pseudo, $mdp, $email, $avatar) {
        /*
         * $host = 'mysql-thesavorist.alwaysdata.net';
         * $dbname = 'thesavorist_site';
         * $username = '295285';
         * $password = '*OnadesnotesIncr13*';
         */

        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('INSERT INTO utilisateurs(nom, password, email, date_premiere_connexion, photo) VALUES(?, ?, ?, ?, ?)');

        $date = date('y-m-d h:i:s');
        while(!$req->execute(array($pseudo, $mdp, $email, $date, $avatar))) {
            $req->execute(array($pseudo, $mdp, $email, $date, $avatar));
        }
        header('Location:/index.php');
        exit;
    }

    public function verifie_utilisateur($pseudo) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('SELECT nom FROM utilisateurs WHERE nom = ?');
        while(!$req ->execute(array($pseudo))) {
            $req ->execute(array($pseudo));
        }
        $verif = $req -> fetchAll(PDO::FETCH_ASSOC);

        if (!empty($verif)) {
            echo "nom d'utilisateur déjà utiliser";
            die;
        }
    }

    public function verifie_email($email) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('SELECT email FROM utilisateurs WHERE email = ?');
        while(!$req ->execute(array($email))) {
            $req ->execute(array($email));
        }
        $verif = $req -> fetchAll(PDO::FETCH_ASSOC);

        if (!empty($verif)) {
            echo "adresse email déjà utiliser";
            die;
        }
    }
}
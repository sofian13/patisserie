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
        $req->execute(array($pseudo, $mdp, $email, $date, $avatar));
    }

    private $_S_message = "Login";

    public function donneMessage()
    {
        return $this->_S_message ;
    }

    public function verifie_utilisateur($pseudo) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('SELECT nom FROM utilisateurs WHERE nom = ?');
        $req ->execute(array($pseudo));
        $verif = $req -> fetchAll(PDO::FETCH_ASSOC);

        if (!empty($verif)) {
            echo "nom d'utilisateur déjà utiliser";
            die;
        }
    }

    public function verifie_email($email) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('SELECT email FROM utilisateurs WHERE email = ?');
        $req ->execute(array($email));
        $verif = $req -> fetchAll(PDO::FETCH_ASSOC);

        if (!empty($verif)) {
            echo "adresse email déjà utiliser";
            die;
        }
    }
}
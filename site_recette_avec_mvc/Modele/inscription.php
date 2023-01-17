<?php

final class inscription {

    public function ajoute_utilisateur($pseudo, $mdp, $email) {
        /*
         * $host = 'mysql-thesavorist.alwaysdata.net';
         * $dbname = 'thesavorist_site';
         * $username = '295285';
         * $password = '*OnadesnotesIncr13*';
         */

        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES(?, ?, ?, ?)');

        $date = date('y-m-d h:i:s');
        $req->execute(array($pseudo, $mdp, $email, $date));
    }

    private $_S_message = "Login";

    public function donneMessage()
    {
        return $this->_S_message ;
    }
}
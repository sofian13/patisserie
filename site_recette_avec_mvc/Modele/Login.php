<?php

final class Login
{
    private $_S_message = "Login";

    public function donneMessage()
    {
        return $this->_S_message ;
    }

    public function connexion($pseudo, $mdp)
    {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('SELECT nom, password FROM utilisateur WHERE nom = ? AND password = ?');
        $req->execute(array($pseudo, $mdp));
        var_dump($req);
    }
}
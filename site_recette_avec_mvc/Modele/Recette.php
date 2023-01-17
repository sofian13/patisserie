<?php

final class Recette {

    public function ajoute_recette($nom,$ingredient,$instruction, $liste_ingredient,$liste_ustensile,$temps,$cout) {
        /*
         * $host = 'mysql-thesavorist.alwaysdata.net';
         * $dbname = 'thesavorist_site';
         * $username = '295285';
         * $password = '*OnadesnotesIncr13*';
         */

        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('INSERT INTO recettes(nom, ingredients, instructions, liste_ingredients, liste_ustensiles, temps_preparation, cout) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($nom,$ingredient,$instruction, $liste_ingredient,$liste_ustensile,$temps,$cout));
    }

    private $_S_message = "Recette";

    public function donneMessage()
    {
        return $this->_S_message ;
    }
}
<?php

final class Recette {

    public function ajoute_recette($nom,$ingredient,$instruction,$image, $liste_ingredient,$liste_ustensile,$temps,$difficulte,$cout, $particularite) {
        /*
         * $host = 'mysql-thesavorist.alwaysdata.net';
         * $dbname = 'thesavorist_site';
         * $username = '295285';
         * $password = '*OnadesnotesIncr13*';
         */

        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('INSERT INTO recettes(nom, ingredients, instructions,image, liste_ingredients, liste_ustensiles, temps_preparation, difficulte, cout,liste_particularite) VALUES(?,?,?, ?, ?, ?, ?, ?, ?,?)');
        $req->execute(array($nom,$ingredient,$instruction,$image, $liste_ingredient,$liste_ustensile,$temps,$difficulte,$cout, $particularite));
    }

    private $_S_message = "Recette";

    public function donneMessage()
    {
        return $this->_S_message ;
    }
}

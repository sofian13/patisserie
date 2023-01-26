<?php

final class recipe {

    public function ajoute_comm($pseudo, $titre, $commentaire, $note, $id_recette) {

        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $bdd->prepare('INSERT INTO appreciations(auteur, id_recette, note, titre, commentaire) VALUES(?, ?, ?, ?, ?)');

        $date = date('y-m-d h:i:s');
        while(!$req->execute(array($pseudo, $id_recette, $note, $titre, $commentaire))) {
            $req->execute(array($pseudo, $id_recette, $note, $titre, $commentaire));
        }
        header('Location:/recipe');
        exit;
    }

    public function test() {

        header('Location:/index/gedtshtsrgheteth');
    }
}
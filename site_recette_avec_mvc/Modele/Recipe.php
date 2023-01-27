<?php

final class recipe {

    public function ajoute_comm($pseudo, $titre, $commentaire, $note, $id_recette) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
        $req = $bdd->prepare('INSERT INTO appreciations(auteur, id_recette, note, titre, commentaire) VALUES(?, ?, ?, ?, ?)');
        while(!$req->execute(array($pseudo, $id_recette, $note, $titre, $commentaire))) {
            $req->execute(array($pseudo, $id_recette, $note, $titre, $commentaire));
        }
        header('Location:/recipe');
        exit;
    }

    public function getRecipeById($id_recette) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
        $query = $bdd->prepare('SELECT instructions, nom, image , liste_ingredients, temps_preparation, difficulte, cout FROM recettes WHERE id = :id');
        $query->execute(['id' => $id_recette]);
        return $query->fetch();
    }
    
    public function getCommentairesByRecetteId($id_recette) {
        $bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
        $req = $bdd->prepare('SELECT auteur,note,titre,commentaire,CAST(created_at AS date) as date,photo FROM appreciations,utilisateurs WHERE id_recette = :id_recette AND auteur=nom ORDER BY created_at DESC');
        $req->execute(array(':id_recette' => $id_recette));
        return $req->fetchAll();
    }
}
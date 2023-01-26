<?php

final class ControleurRecipe
{
    public function defautAction()
    {
        $O_bdd = new recipe();
        Vue::montrer('recipe/voir');
    }

    public function ajoute_commAction(array $urlParameters, array $postParameters)
    {
        session_start();
        $pseudo = $_SESSION['utilisateur'];
        $titre = $postParameters['comment-title'];
        $commentaire = $postParameters['comment'];
        if (isset($postParameters['rating'])) {
            $note = $postParameters['rating'];
        } else {
            $note = 5;
        }
        $id_recette = $postParameters['id_recette'];
        $O_bdd = new recipe();
        $O_bdd->ajoute_comm($pseudo, $titre, $commentaire, $note, $id_recette);
    }

    public function testAction()
    {
        $O_bdd = new recipe();
        $O_bdd->test();

    }
}
<?php

final class ControleurRecette
{
    public function defautAction()
    {
        $O_bdd = new Recette();
        Vue::montrer('recette/voir', array('recette' =>  $O_bdd->donneMessage()));

    }

    public function ajoute_recetteAction(array $urlParameters, array $postParameters) {
        var_dump($_FILES);
        $nom = $postParameters['nom'];
        $ingredient = $postParameters['ingredient'];
        $instruction = $postParameters['instruction'];
        $image = file_get_contents($_FILES['avatar']['tmp_name']);
        $particularite = $postParameters['particularite'];
        $liste_ingredient = $postParameters['liste_ingredient'];
        $liste_ustensile = $postParameters['liste_ustensile'];
        $temps = $postParameters['temps'];
        $difficulte = $postParameters['difficulte'];
        $cout = $postParameters['cout'];


     
        $O_bdd = new Recette();

        $O_bdd ->ajoute_recette($nom,$ingredient,$instruction,$image,$liste_ingredient,$liste_ustensile,$temps,$difficulte,$cout,$particularite);
    }
}

<?php

final class ControleurRecette
{
    public function defautAction()
    {
        $O_bdd = new Recette();
        Vue::montrer('recette/voir', array('recette' =>  $O_bdd->donneMessage()));

    }

    public function ajoute_recetteAction() {

        $nom = $_POST['nom'];
        $ingredient = $_POST['ingredient'];
        $instruction = $_POST['instruction'];
        $liste_ingredient = $_POST['liste_ingredient'];
        $liste_ustensile = $_POST['liste_ustensile'];
        $temps = $_POST['temps'];
        $cout = $_POST['cout'];


        $O_bdd = new Recette();

        $O_bdd ->ajoute_recette($nom,$ingredient,$instruction, $liste_ingredient,$liste_ustensile,$temps,$cout);
    }
}

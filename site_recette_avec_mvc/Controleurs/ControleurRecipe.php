<?php

final class ControleurRecipe
{
    public function defautAction()
    {
        $O_bdd = new Recipe();
        Vue::montrer('recipe/voir');
    }

    public function ajoute_commAction(array $urlParameters, array $postParameters)
    {
        $pseudo = $_SESSION['utilisateur'];
        $titre = $postParameters['comment-title'];
        $commentaire = $postParameters['comment'];
        if (isset($postParameters['rating'])) {
            $note = $postParameters['rating'];
        } else {
            $note = 5;
        }
        $id_recette = $postParameters['id_recette'];
        echo $id_recette;
        $O_bdd = new Recipe();
        $O_bdd->ajoute_comm($_SESSION['utilisateur'], $postParameters['comment-title'], $postParameters['comment'], $note, $postParameters['id_recette']);
    }

    public function supprime_commAction(array $urlParameters, array $postParameters)
    {
        $O_bdd = new Recipe();
        $O_bdd->supprime_comm($postParameters['id_comm'], $_SESSION["id_recette"]);
    }

    public function getassetsAction()
    {
        // get id
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];
        // id = url.split("=")[1];
        $_SESSION["id_recette"] = explode("=", $url)[1];
        $O_bdd = new Recipe();
        // get recipe
        $_SESSION["recipe"] = $O_bdd->getRecipeById($_SESSION["id_recette"]);
        // get commentaires
        $_SESSION["commentaires"] = $O_bdd->getCommentairesByRecetteId($_SESSION["id_recette"]);
        // On affiche la page recipe en appelant le defautAction du controleur
        header('Location:/recipe');
    }
}
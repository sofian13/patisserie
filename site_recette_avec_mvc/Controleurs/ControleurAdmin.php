<?php

final class ControleurAdmin
{
    private $model;
    public function defautAction()
    {
        $this->model = new Admin();
        $id = $_GET['id'];
        Vue::montrer('/admin/voir', array('admin' =>  $this->model->deleteRecette($id)));
    }


    public function checkAdminAction()
    {
        if (isset($_SESSION['pseudo'])) {
            $pseudo = $_SESSION['pseudo'];
            $isAdmin = $this->model->checkAdmin($pseudo);
            if ($isAdmin == 1) {
                $_SESSION['userAdmin'] = true;
                echo 'test';
            } else {
                $_SESSION['userAdmin'] = false;
                echo 'pd';
            }
        } else {
            echo "La variable de session pseudo n'est pas définie";
        }
    }

    public function supprimerRecette() {
        // récupérer l'id de la recette à supprimer
        $id = $_GET['id'];

        // instancier le modèle de recette
        $recetteModel = new Admin();

        // utiliser la méthode deleteRecette pour supprimer la recette
        $recetteModel->deleteRecette($id);

        // rediriger l'utilisateur vers la liste des recettes
        //header('location: /liste-recettes.php');
    }
}

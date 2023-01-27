<?php

final class ControleurAdmin
{
    private $model;
    public function defautAction()
    {
        $this->model = new Admin();
        $_SESSION['users_list'] = $this->model->getUsers();
        Vue::montrer('admin/voir');
    }

    public function supprimerUtilisateurAction() {
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
        $_SESSION["id_user"] = explode("=", $url)[1];

        // instancier le modèle Admin
        $this->model = new Admin();
    
        // utiliser la méthode deleteUsers pour supprimer un utilisateur
        $this->model->deleteUsers($_SESSION["id_user"]);
    
        // rediriger l'utilisateur vers la liste des utilisateurs
        header('location: /admin');
    }

    public function checkAdminAction()
    {
        $this->model = new Admin();
    
        if (isset($_SESSION['utilisateur'])) {
            $pseudo = $_SESSION['utilisateur'];
            $isAdmin = $this->model->checkAdmin($pseudo);
            if ($isAdmin == 1) {
                $_SESSION['userAdmin'] = true;
                header('location: /index.php');
            } else {
                $_SESSION['userAdmin'] = false;
   
                echo "Erreur : Vous n'êtes pas un admin. Vous allez être redirigé dans 3 secondes ";

    header("Refresh: 3;/index.php");
            }
        } else {
            echo "La variable de session pseudo n'est pas définie";
        }
    }
    public function supprimerRecetteAction() {
        // récupérer l'id de la recette à supprimer
        $id = $_GET['id'];
        var_dump($_GET['id']);
        echo $_GET['id'];
        // instancier le modèle de recette
        $recetteModel = new Admin();
    
        // utiliser la méthode deleteRecette pour supprimer la recette
        $recetteModel->deleteRecette($id);
    
        // rediriger l'utilisateur vers la liste des recettes
        //header('location: /liste-recettes.php');
    }
}
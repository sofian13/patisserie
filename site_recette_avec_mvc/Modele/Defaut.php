<?php

final class Defaut
{
    private $_S_message = "Defaut";
    private $db;
    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
        }  catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }
    public function donneMessage()
    {
        return $this->_S_message ;
    }

    //Fonction pour rechercher des recettes
    public function getRecipes() {
        $stmt = $this->db->prepare("SELECT * FROM recettes ORDER BY RAND() LIMIT 3");
        
        // Si la requête échoue
        if ($stmt->execute() === false) {
            throw new Exception("Error Processing Request", 1);
            
        }
        //Retourne les 3 recettes aléatoires de la requete
            return $stmt->fetchAll();
       
    }

    //Fonction pour obtenir l'image d'une recette par son id
    public function getImage($id){
        $stmt = $this->db->prepare("SELECT image FROM recettes WHERE id LIKE :id");
        if($stmt->execute(['id' => $id])){
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
}
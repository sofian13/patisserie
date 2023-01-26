<?php

final class Recherche
{
    private $_S_message = "Recherche";
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

    //Fonction de recherche des recettes
    public function searchRecipes($query) {
        $query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);
        $stmt = $this->db->prepare("SELECT * FROM recettes WHERE nom LIKE :query");
        if ($stmt->execute(['query' => "%$query%"]) === false) {
            throw new Exception("Error Processing Request", 1);
            
        }
            return $stmt->fetchAll();
    }
}

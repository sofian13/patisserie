<?php

final class Tri
{
    private $_S_message = "Tri";
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

    public function sortByCout() {
        $stmt = $this->db->prepare("SELECT * FROM recettes WHERE cout IN ('Bon marché','Moyen')");
        if ($stmt->execute() === false) {
        throw new Exception("Error Processing Request", 1);
        }
        return $stmt->fetchAll();
    }

    public function sortByDifficulte() {
        $stmt = $this->db->prepare("SELECT * FROM recettes order by difficulte desc");
        if ($stmt->execute() === false) {
        throw new Exception("Error Processing Request", 1);
        }
        return $stmt->fetchAll();
    }
    
   
}



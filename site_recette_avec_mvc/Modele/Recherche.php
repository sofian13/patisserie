<?php

final class Recherche
{
    private $_S_message = "Recherche";
    
    public function donneMessage()
    {
        return $this->_S_message ;
    }
  //Fonction de recherche des recettes
  public function searchRecipes($query) {
    $host = 'mysql-thesavorist.alwaysdata.net  ';
        $dbname = 'thesavorist_site';
        $username = '295285';
        $password = '*OnadesnotesIncr13*';

    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $this->$db->prepare("SELECT id, nom FROM recettes WHERE nom LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
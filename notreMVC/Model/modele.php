<?php
class Model{
  // Connexion à la base de données
  private $host = 'mysql-thesavorist.alwaysdata.net';
  private $dbname = 'thesavorist';
  private $username = '295285';
  private $password = '*OnadesnotesIncr13*';

  private $db;
  public function __construct() {
    try {
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
  }

  // Récupération des recettes
  public function getRecipes() {
    $stmt = $this->db->prepare('SELECT id, nom FROM recettes');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  // Récupération des détails d'une recette
  public function getRecipeDetails($id) {
    $stmt = $this->db->prepare('SELECT * FROM recettes WHERE id = :id');
    $stmt->execute(array(':id' => $id));
    return $stmt->fetch();
  }

  //Fonction de recherche des recettes
  public function searchRecipes($query) {
    $stmt = $this->db->prepare("SELECT id, nom FROM recettes WHERE nom LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
}

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
    $stmt = $this->db->prepare("SELECT id, nom FROM recettes WHERE nom LIKE '%$query%'");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
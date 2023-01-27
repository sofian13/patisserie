<?php

final class Admin
{
    // Instance de la classe pour la connexion à la base de données
    private $db;

    public function __construct()
    {
        // Connexion à la base de données avec les informations de connexion spécifiques
        $this->db = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
    }

    // Vérifie si l'utilisateur avec le pseudo donné est un administrateur
    public function checkAdmin($pseudo)
    {
        // Préparation de la requête pour sélectionner le champ "admin" de l'utilisateur avec le pseudo donné
        $query = $this->db->prepare('SELECT admin FROM utilisateurs WHERE nom = :pseudo');
        $query->execute(['pseudo' => $pseudo]);
        $result = $query->fetch();
        // Retourne le résultat de la requête
        return $result['admin'];
    }

    // Supprime la recette avec l'ID donné
    public function deleteRecette($id)
    {
        // Récupération de l'ID de la recette à supprimer via la variable $_GET
        $id = $_GET['id'];
        // Affichage du contenu de la variable $id (utile pour le débogage)
        var_dump($id);
        // Préparation de la requête pour supprimer la recette avec l'ID donné
        $query = $this->db->prepare('DELETE from recettes WHERE id = :id');
        $query->execute(['id' => $id]);
        header('location: /index.php');
    }
}
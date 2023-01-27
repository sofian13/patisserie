<?php

final class Admin
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
    }

    public function getUsers(){
        $query = $this->db->prepare('SELECT admin,email,nom,date_premiere_connexion,date_derniere_connexion,id FROM utilisateurs');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function deleteUsers($id){
        $query = $this->db->prepare('DELETE FROM utilisateurs WHERE `utilisateurs`.`id` = ?');
        $query->execute(array($id));
        $result = $query->fetchAll();
        return $result;
    }

    public function checkAdmin($pseudo)
    {
        $query = $this->db->prepare('SELECT admin FROM utilisateurs WHERE nom = :pseudo');
        $query->execute(['pseudo' => $pseudo]);
        $result = $query->fetch();
        return $result['admin'];
    }


    public function deleteRecette($id)
    {
        $id = $_GET['id'];
        var_dump($id);
        $query = $this->db->prepare('DELETE from recettes WHERE id = :id');
        $query->execute(['id' => $id]);
        $stmt = $this->db->prepare($query);

        $stmt->execute();
       
    }




}

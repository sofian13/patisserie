<?php
$db = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');



if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
    echo $pseudo;
    $query = $db->prepare('SELECT admin FROM  utilisateurs WHERE nom = :pseudo');
    $query->execute(['pseudo' => $pseudo]);
    $result = $query->fetch();
    $image = $result['admin'];


    if($image == 1){
        $_SESSION['userAdmin'] = true;
        
        echo $_SESSION['userAdmin'];
        header('location:index.php');
    }else{
        $_SESSION['userAdmin'] = false;
         echo'pd';
         header('location:index.php');



}
} else {
    echo "La variable de session pseudo n'est pas définie";
}

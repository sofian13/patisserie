<form method="post">
    <input type="password" name="mdp" required>
    <input type="password" name="mdpverif" required>
    <button name="btnConfirmation">Confirmer</button>
</form>
<?php
if($_POST){
    changeMdp($_POST['mdp'],$_POST['mdpverif'], $_GET['token']);
}
function changeMdp($mdp, $mdpverif, $token) {
    $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

    $req = $O_bdd ->prepare('SELECT * FROM token WHERE token_key = ?');
    $req ->execute(array($token));

    $majuscule = preg_match('@[A-Z]@', $mdp);
    $minuscule = preg_match('@[a-z]@', $mdp);
    $chiffre = preg_match('@[0-9]@', $mdp);
    $caractereSpecial = preg_match('@[^\w]@', $mdp);

    if (!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial || strlen($mdp) < 8) {
        echo "<script>
            msgErreur = document.createElement('p').textContent='mot de passe pas valide, il doit faire au moins 8 caractères de long, il doit contenir au moins 1 chiffre, 1 caractère spécial, 1 majuscule et 1 minuscule.'
            document.getElementById('mdp').appendChild(msgErreur)</script>";
        die;
    }

    if ($mdp != $mdpverif) {
        echo "mots de passe pas correspondant";
        die;
    }

    $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
    $ligne = $req ->fetchAll();

    if ($ligne > 0) {
        $ligne2 = $ligne[0];

        if (strtotime($ligne2[0]) > strtotime(date('y-m-d h:i:s'))) {
            $req = $O_bdd ->prepare('UPDATE utilisateurs SET password = ? WHERE email = ?');
            $req ->execute(array($mdp_hash, $ligne2['email']));
        }
        else {
            echo 'Le lien a expiré';
        }
    }
    else {
        echo 'le lien est invalide';
    }
}
?>
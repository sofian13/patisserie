<?php

class Reinisialisation_mdp
{
    public $token = 0;
    function defautAction() {
        Vue::montrer('Reinisialisation_mdp/temporaire');
    }
    function compteExiste($email) {
        $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $O_bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');

        $req->execute(array($email));

        $email_bd = $req ->fetch();

        if ($email_bd === false) {
            echo "Aucun compte n'est enregistré avec cette adresse e-mail.";
        }

        else {
            $this->token = uniqid();
            $token = $this->token;
            $date_expiration = date('y-m-d h:i:s', strtotime("+1 day"));

            $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

            $req = $O_bdd ->prepare('INSERT INTO token (expire,token_key, email) VALUES (?,?,?)');

            $req ->execute(array($date_expiration, $token, $email));


            $lien_re = "http://testprojet.alwaysdata.net/index.php?url=Reinisialisation_mdp/temporaire&token=$token";
            $message = "Cliquez sur ce lien pour réinitialiser votre mot de passe : $lien_re";
            mail($email, "Réinitialisation du mot de passe", $message);

            echo "Un email a été envoyé à $email";
        }
    }

    function changeMdp($mdp, $token) {
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
}
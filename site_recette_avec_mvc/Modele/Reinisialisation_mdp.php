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
            echo "$lien_re";
        }
    }

    function changeMdp($mdp, $token) {
        $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');

        $req = $O_bdd ->prepare('SELECT * FROM token WHERE email = ?');
        $req ->execute(array($token));

        $ligne = $req ->fetchAll();

        var_dump($ligne);

        if ($ligne > 0) {
            $dateExpiration = $ligne['expire'];

            if (strtotime($dateExpiration) > strtotime(date('y-m-d h:i:s'))) {
                $req = $O_bdd ->prepare('UPDATE utilisateurs SET password = ? FROM utilisateurs, token WHERE utilisateurs.email = token.email AND token.email = ?');
                $req ->execute(array($mdp, $ligne['email']));
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
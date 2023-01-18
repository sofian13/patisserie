<?php

class ControleurInscription
{
    public function defautAction()
    {
        $O_bdd = new inscription();

        Vue::montrer('inscription/voir');
    }

    public function ajoute_utilisateurAction(array $urlParameters, array $postParameters)
    {
        var_dump($_FILES);
        $pseudo = $postParameters['pseudo'];
        $email = $postParameters['email'];
        $mdp = $postParameters['mdp'];
        $mdpverif = $postParameters['mdpverif'];
        $avatar = file_get_contents($_FILES['avatar']['tmp_name']);

        $O_bdd = new inscription();

        $O_bdd->verifie_utilisateur($pseudo);
        $O_bdd->verifie_email($email);

        $majuscule = preg_match('@[A-Z]@', $mdp);
        $minuscule = preg_match('@[a-z]@', $mdp);
        $chiffre = preg_match('@[0-9]@', $mdp);
        $caractereSpecial = preg_match('@[^\w]@', $mdp);

        /*imagejpeg($avatar, 'php://memory/temp.jpeg');

        if (round(filesize('php://memory/temp.jpeg') / 1024, 3) > 8) {
            echo "avatar trop lourd";
            die;
        }*/

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
        $O_bdd->ajoute_utilisateur($pseudo, $mdp_hash, $email, $avatar);
    }
}
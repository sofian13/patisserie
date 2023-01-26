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
        $pseudo = $postParameters['pseudo'];
        $email = $postParameters['email'];
        $mdp = $postParameters['mdp'];
        $mdpverif = $postParameters['mdpverif'];
        if($_FILES['avatar']['tmp_name'] == "") {
            $avatar = NULL;
        }
        else {
            $avatar = file_get_contents($_FILES['avatar']['tmp_name']);
        }

        $O_bdd = new inscription();

        $majuscule = preg_match('@[A-Z]@', $mdp);
        $minuscule = preg_match('@[a-z]@', $mdp);
        $chiffre = preg_match('@[0-9]@', $mdp);
        $caractereSpecial = preg_match('@[^\w]@', $mdp);

        if (!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial || strlen($mdp) < 8) {
            echo "mot de passe pas valide, il doit faire au moins 8 caractères de long, il doit contenir au moins 1 chiffre, 1 caractère spécial, 1 majuscule et 1 minuscule.";
            header('Location:/index.php?url=inscription');
            die;
        }

        $O_bdd->verifie_utilisateur($pseudo);
        $O_bdd->verifie_email($email);

        if ($mdp != $mdpverif) {
            echo "mots de passe pas correspondant";
            die;
        }

        $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
        $O_bdd->ajoute_utilisateur($pseudo, $mdp_hash, $email, $avatar);
    }
}
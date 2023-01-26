<?php

class ControleurReinisialisation_mdp
{
    public function defautAction() {
        Vue::montrer('Reinisialisation_mdp/voir');
    }
    function temporaireAction() {
        Vue::montrer('Reinisialisation_mdp/temporaire');
    }

    public function envoieMailAction(array $urlParameters, array $postParameters) {
        $O_re_mdp = new Reinisialisation_mdp();

        $email = $postParameters['email'];

        $O_re_mdp ->compteExiste($email);
    }

    public function changeMdpAction(array $urlParameters, array $postParameters) {
        $O_re_mdp = new Reinisialisation_mdp();

        $mdp = $postParameters['mdp'];
        $mdpverif = $postParameters['mdpverif'];

        if ($mdp == $mdpverif) {
            $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
            $O_re_mdp->changeMdp($mdp_hash);
        }
        else {
            echo "Les mots de passe ne correspondent pas.";
        }
    }
}
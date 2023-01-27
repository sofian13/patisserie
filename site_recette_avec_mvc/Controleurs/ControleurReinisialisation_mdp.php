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

    public function changeMdpAction($mdp, $mdpverif, $token) {
        $O_re_mdp = new Reinisialisation_mdp();

        if ($mdp == $mdpverif) {
            $O_re_mdp->changeMdp($mdp, $token);
        }
        else {
            echo "Les mots de passe ne correspondent pas.";
        }
    }
}
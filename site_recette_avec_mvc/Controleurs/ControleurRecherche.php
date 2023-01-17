<?php

final class ControleurRecherche
{
    public function defautAction()
    {
        $O_defaut =  new Defaut();
        Vue::montrer('recherche/voir', array('Recherche' =>  $O_defaut->donneMessage()));

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {

        Vue::montrer('recherche/testform', array('formData' =>  $A_postParams));

    }

}
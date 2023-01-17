<?php

final class ControleurDefaut
{
    public function defautAction()
    {
        $O_defaut =  new Defaut();
        Vue::montrer('defaut/voir', array('Defaut' =>  $O_defaut->donneMessage()));

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {

        Vue::montrer('defaut/testform', array('formData' =>  $A_postParams));

    }

}
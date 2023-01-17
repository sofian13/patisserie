<?php

final class ControleurRecipe
{
    public function defautAction()
    {
        $O_defaut =  new Defaut();
        Vue::montrer('recipe/voir', array('Defaut' =>  $O_defaut->donneMessage()));

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {

        Vue::montrer('recipe/testform', array('formData' =>  $A_postParams));

    }

}
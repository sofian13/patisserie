<?php

final class ControleurLogin
{
    public function defautAction()
    {
        $O_login =  new Login();
        Vue::montrer('login/voir', array('Login' =>  $O_login->donneMessage()));

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {

        Vue::montrer('login/testform', array('formData' =>  $A_postParams));

    }

}
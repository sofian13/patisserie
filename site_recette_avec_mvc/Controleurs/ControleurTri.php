<?php
final class ControleurTri
{
    public function defautAction()
    {
        $O_tri =  new Tri();
        
        Vue::montrer('defaut/voir', array('tri' =>  $O_tri->sortByCout()));

    }
}

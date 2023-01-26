<?php
final class ControleurTri
{
    public function defautAction()
    {
        $O_tri =  new Tri();
        
        Vue::montrer('defaut/voir', array('triCout' =>  $O_tri->sortByCout(),'triDifficulte' =>  $O_tri->sortByDifficulte()));

    }
}

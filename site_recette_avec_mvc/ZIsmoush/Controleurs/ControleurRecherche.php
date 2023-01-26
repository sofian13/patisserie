<?php
final class ControleurRecherche
{
    public function defautAction()
    {
        $O_recherche =  new Recherche();
        $query = $_GET['query'];
        Vue::montrer('defaut/voir', array('recherche' =>  $O_recherche->searchRecipes($query)));

    }
}

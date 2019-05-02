<?php

class roomControlleur
{
    public function addRoom () {
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $capacity = filter_input(INPUT_POST, 'capacity', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $league = filter_input(INPUT_POST, 'league', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //var_dump($league);

        $bdd = new bddControlleur();
        $bdd->_connect();
        $tab = $bdd->queryStatement("SELECT id FROM league WHERE name='$league'");
        //var_dump($tab);
        $idLeague = $tab[0]['id'];
        // var_dump($idLeague);
        $bdd->queryStatement("INSERT INTO room (number, capacity, idLeague) VALUES ('$number', '$capacity', '$idLeague')");
    }
}
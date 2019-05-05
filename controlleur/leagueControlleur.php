<?php


class leagueControlleur
{

    public function addLeague () {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $bdd = new bddControlleur();
        $bdd->_connect();

        $send = $bdd->querySimple("INSERT INTO league (name, address) VALUES ('$name', '$address')");

    }

    public function getListLeague () {
        $bdd = new bddControlleur();
        $bdd->_connect();
        return $bdd->queryStatement("SELECT name,id FROM league");
    }

}
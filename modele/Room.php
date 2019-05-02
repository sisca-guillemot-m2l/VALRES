<?php


class Room
{
    private $id;
    private $num;
    private $league;

    public function getNum () {
        return $this->num;
    }

    public function getLeague () {
        return $this->league;
    }

    public function setNum ($num) {
        $this->num = $num;
    }

    public function setLeague ($league) {
        $this->league = $league;
    }
}
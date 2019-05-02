<?php

namespace calendar;

require_once '../controlleur/bddControlleur.php';
require_once '../conf/ressource.php';

class EventCalendar
{

    private $id;
    private $name;
    private $description;
    private $start;
    private $end;

    public function __construct($id)
    {
        $bdd = new \bddControlleur();
        $bdd->_connect();
        $result = $bdd->queryStatement("SELECT * FROM calendar WHERE id=$id");
        $value = $result[0];
        $this->id = $value['id'];
        $this->name = $value['name'];
        $this->description = $value['description'];
        $this->start = $value['start'];
        $this->end = $value['end'];
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    public function getStart(): \DateTime {
        return new \DateTime($this->start);
    }

    public function getEnd(): \DateTime {
        return new \DateTime($this->end);
    }

    public function display (){
        echo 'ID : '.$this->id.'<br>';
        echo 'name : '.$this->name.'<br>';
        echo 'description : '.$this->description.'<br>';
        echo 'start : '.$this->start.'<br>';
        echo 'end : '.$this->end.'<br>';
    }

    public function setName (string $name) {
        $this->name = $name;
    }

    public function setDescription ($description) {
        $this->description = $description;
    }

    public function setStart ($start) {
        $this->start = $start;
    }

    public function setEnd ($end) {
        $this->end = $end;
    }
}
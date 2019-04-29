<?php

namespace modele\Events;
require_once '../controlleur/bddControlleur.php';
require_once '../conf/ressource.php';


class Events
{
    /**
     * obtenir les evenements stocké dans la BDD en fonction d'un interval
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetween(\DateTime $start, \DateTime $end): array
    {
        // 1 : connexion à la bdd
        $bdd = new \bddControlleur();
        $bdd->_connect();
        //var_dump("test");
        // 2 : récupérer les valeurs en tableau associatif
        $sql = $bdd->queryStatement("SELECT * FROM calendar WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'");

        //$sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        var_dump($sql);
        return [];
    }


    /**
     * Index par jour
     * timestamp : video 2 : 15:00
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end): array
    {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])) {
                $days['date'] = [$event];
            } else {
                $days['$date'][] = $event;
            }
        }

        return $days;
    }
}
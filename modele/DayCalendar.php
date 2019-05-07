<?php

require_once '../controlleur/bddControlleur.php';
require_once '../conf/ressource.php';


class DayCalendar
{
    private $day;
    private $month;
    private $year;

    /**
     * DayCalendar constructor.
     * @param int|null $day
     * @param int|null $month
     * @param int|null $year
     * @throws Exception
     */
    public function __construct(?int $day, ?int $month = null,?int $year = null)
    {
        if ($month === null)
        {
            $month= intval(date('m')); // parse string to int
        }
        if ($year === null)
        {
            $year= intval(date('Y')); // parse string to int
        }
        if ($day === null)
        {
            $day= intval(date('d')); // parse string to int
        }

        if ($month<1 || $month>12){
            throw new \Exception("Le mois ".$month." n'est pas valide ");
        }
        if ($year<2000){
            throw new \Exception("Année n'est pas valide");
        }
        if ($day<0 || $day>31){
            throw new \Exception("Année n'est pas valide");
        }

        $this->month=$month;
        $this->year=$year;
        $this->day=$day;
    }


    /**
     * @return DateTime
     * @throws Exception
     */
    public function getStartingDay (): \DateTime {
        return new \DateTime("{$this->year}-{$this->month}-{$this->day} 00:00:00");
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getDay () {
        $debutJour = $this->getStartingDay();
        $finJour = (clone ($debutJour))->modify('+1 day');
        $finJour->modify('-1 second');

        $interval = $debutJour->diff($finJour);

        return array('interval'=>(int)$interval->days,
            'jourDebut' => $debutJour,
            'jourFin' => $finJour);
    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     * @return array
     */
    public function displayEventByDay (\DateTime $start,\DateTime $end): array {
        $bdd = new bddControlleur();
        $bdd->_connect();
        //var_dump($start->format('Y-m-d H:i:s'));
        //var_dump($end->format('Y-m-d H:i:s'));
        $sql = $bdd->queryStatement("SELECT * FROM calendar WHERE start BETWEEN '{$start->format('Y-m-d H:i:s')}' AND '{$end->format('Y-m-d H:i:s')}'");
        //var_dump($sql);
        return $sql;
    }

}
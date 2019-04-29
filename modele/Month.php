<?php

namespace modele\Month;

class Month
{
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']; // utilisable hors de la classe. Necessaire pour les jours de la semaine

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
    public $month;
    public $year;

    /**
     * Month constructor.
     * @param null $month
     * @param null $year
     * @throws \Exception
     */
    public function __construct(?int $month = null,?int $year = null)
    {
        if ($month === null)
        {
            $month= intval(date('m')); // parse string to int
        }
        if ($year === null)
        {
            $year= intval(date('Y')); // parse string to int
        }

        if ($month<1 || $month>12){
            throw new \Exception("Le mois ".$month." n'est pas valide ");
        }
        if ($year<2000){
            throw new \Exception("Année n'est pas valide");
        }

        $this->month=$month;
        $this->year=$year;


    }

    /**
     * @return int
     * @throws \Exception
     */
    /*
    public function getWeeksOld () :int
    {
        $start = $this->getStartingDay();
        $end =  (clone $start)->modify('+1 month -1 day');
        //var_dump($end);
        $startWeek = intval($start->format('W'));
        $endWeek =intval($end->format('W'));
        if ($endWeek ===1){
            $endWeek =intval($end ->modify('- 7 days')->format('W')) + 1;
        }
        $weeks = $endWeek - $startWeek + 1;
        if ($weeks < 0){
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }*/

    public function getWeeks ()
    {
        $debutMois = $this->getStartingDay(); // le jour pour lequel on est le premier du mois
        $finMois = (clone ($debutMois))->modify('last day of this month'); // le jour pour lequel on est à la fin du mois

        $jourDebut = $debutMois->format('N'); // nb jour de la semaine
        $jourFin = $finMois->format('N'); // nb jour fin de la semaine

        $newDateDebut = $debutMois->modify(1-$jourDebut.' day');
        $newDateFin = $finMois->modify('+'. 7-$jourFin .' day');

        $interval = $newDateDebut->diff($newDateFin);

        return array('interval'=>(int)$interval->days,
            'dateDebut' => $newDateDebut,
            'dateFin' => $newDateFin);
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getStartingDay (): \DateTime
    {
    /*
        $jmonth = new \DateTime("{$this->year}-{$this->month}-01");
        if(($jmonth->format('N'))%7 === 1 ){
            //var_dump("test");
        }else
        {
            $jmonth->modify('last monday');
            //var_dump('choke');
        }
        return $jmonth ;
        */
        return new \DateTime("{$this->year}-{$this->month}-01");
    }

    /**
     * @return string
     */
    public function toString ():string {
        return $this->months[$this->month-1].' '.$this->year;
    }

    /**
     * Est ce que le jour est dans le mois en cours
     * @param \DateTime $date
     * @return bool
     */
    public function withinMonth (\DateTime $date): bool {
        $dateO = new \DateTime("{$this->year}-{$this->month}-01");
        return $dateO->format('Y-m') === $date->format('Y-m');
    }


    /**
     * @return Month
     * @throws \Exception
     */
    public function nextMonth(): Month
    {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * @return Month
     * @throws \Exception
     */
    public function previousMonth(): Month
    {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}

<?php
    require 'header.php';
?>

<?php
        require_once "../modele/Month.php";
        require_once "../modele/Events.php";
        $events = new \modele\Events\Events();
        try {
            $month = new \modele\Month\Month($_GET['month'] ?? null, $_GET['year'] ?? null); // ?? si non défini alors = (ici null)
        } catch (\Exception $e) {
            $month = new \modele\Month\Month();
        }
        $start = $month->getStartingDay();//->modify('last monday');
        $calendar = $month->getWeeks();
        $event = $events->getEventsBetweenByDay($calendar['dateDebut'], $calendar['dateFin']);
        //$event = $events->getEventsBetween($calendar['dateDebut'], $calendar['dateFin']);
        //var_dump($event);
?>

<div class="calendar">
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?=$month->toString()?></h1>
        <div>
            <a href="/calendar/?month=<?= $month->previousMonth()->month;?>&year=<?= $month->previousMonth()->year;?>" class="btn btn-primary">&lt</a>
            <a href="/calendar/?month=<?= $month->nextMonth()->month;?>&year=<?= $month->nextMonth()->year;?>" class="btn btn-primary">&gt</a>
        </div>
    </div>

    <table class="calendar__table calendar__table--<?php $month->getWeeks();?>">

        <?php
        $calendar = $month->getWeeks();
        $events = $events->getEventsBetween($calendar['dateDebut'], $calendar['dateFin']);
        for($i=0; $i<=$calendar['interval']; $i++):
            $date = (clone $calendar['dateDebut'])->modify('+'.$i.' day');

            if ($i===0) {
                echo '<tr>';
            }
            elseif ($i%7===0){
                echo '</tr><tr>';
            }
            //var_dump($date->format('Y-m-d'));
            $eventsForDay = $event[$date->format('Y-m-d')] ?? [];
            //var_dump($eventsForDay);
        ?>

                <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth';?>"> <!-- ? = is -->

                    <?php if($i===0):?>
                        <div class="calendar__weekday"><?=$day;?></div>
                    <?php endif;?>
                    <div class="calendar__day"><?=$date->format('d');?></div> <!-- {} permet de faire plusieurs opérations -->
                <?php foreach ($eventsForDay as $ev):?>
                    <div class="calendar__event">
                        <?=
                        (new DateTime($ev['start']))->format('H:i') ?> -
                        <a href="/calendar/event.php?id=<?= $ev['id'];?>">
                        <?=
                        $ev['name']
                        ?></a>
                    </div>
                    <?php endforeach;?>
                </td>

        <?php
        if ($i === $calendar['interval']) {
            echo '</tr>';
        }
        endfor; ?>
    </table>
<a href="/calendar/addFormulaire.php" class="calendar__button">+</a>
</div>
<?php require 'footer.php' ?>
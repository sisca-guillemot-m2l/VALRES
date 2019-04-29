<?php
?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="./index.php" class="navbar-brand">Calendrier</a>
    </nav>

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
        //var_dump($calendar['dateFin']);
        var_dump($events);
        ?>

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
    ?>

            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth';?>"> <!-- ? = is -->

                <?php if($i===0):?>
                    <div class="calendar__weekday"><?=$day;?></div>
                <?php endif;?>
                <div class="calendar__day"><?=$date->format('d');?></div> <!-- {} permet de faire plusieurs opérations -->

            </td>

    <?php
    if ($i === $calendar['interval']) {
        echo '</tr>';
    }
    endfor; ?>
</table>
</body>
</html>
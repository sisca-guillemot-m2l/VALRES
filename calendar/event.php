<?php
    require_once 'header.php';
    require_once "../modele/Events.php";
    require_once "../modele/EventCalendar.php";
    $events = new \modele\Events\Events();
    if (!isset($_GET['id'])) {
        header('location: /calendar/404.php');
    }
    //$event = $events->find($_GET['id']);
    //var_dump($event);

    $eventC = new \calendar\EventCalendar($_GET['id']);
    //$eventC->display();
    ?>


<h1><?= $eventC->getName();?></h1>

<ul>
    <li>Date: <?= $eventC->getStart()->format('d/m/y'); ?></li>
    <li>Heure de démarrage: <?= $eventC->getStart()->format('H:i'); ?></li>
    <li>Heure de fin: <?= $eventC->getEnd()->format('H:i'); ?></li>
    <li>Description:<br> <?= htmlentities($eventC->getDescription());?></li>


    <?php ?>
</ul>

<?php
    require 'footer.php';
?>
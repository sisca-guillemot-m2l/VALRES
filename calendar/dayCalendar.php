<?php
require_once "header.php";
require_once "../modele/DayCalendar.php";
require_once "../modele/Events.php";

// Event
$events = new modele\Events\Events();


// Day
try {
    $day = new DayCalendar($_GET['day'] ?? null, $_GET['month'] ?? null, $_GET['year'] ?? null); // ?? si non défini alors = (ici null)
} catch (\Exception $e) {
    //$day = new DayCalendar(null, null, null);
}

// methode
//$start = $day->getStartingDay()->format('Y-m-d H:i:s');
//$end = $day->getEndDay()->format('Y-m-d H:i:s');
//var_dump($day->getDay());
$calendar = $day->getDay();
//var_dump($start);
//var_dump($end);

$event = $day->displayEventByDay($calendar['jourDebut'], $calendar['jourFin']);
var_dump($events);
?>

<h4><?=$_GET['day'];?> <?= $_GET['month'];?> <?= $_GET['year'];?></h4>


<?php foreach ($event as $events): ?>
    <div>Evenement : </div>
    <div>ID évènement : <?=$events['id'];?></div>
    <div>name évènement : <?=$events['name'];?></div>
    <div>description évènement : <?=$events['description'];?></div>
    <div>start évènement : <?=$events['start'];?></div>
    <div>end évènement : <?=$events['end'];?></div>
    <br><br>
<?php endforeach; ?>

<?php
require_once 'footer.php'
?>



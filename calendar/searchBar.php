<?php
require_once '../conf/ressource.php';
require_once '../controlleur/bddControlleur.php';
require_once 'header.php';

$search = $_POST['search'];

$bdd = new bddControlleur();
$bdd->_connect();
$calendarbdd = $bdd->queryStatement("SELECT * FROM calendar WHERE name LIKE '$search%' OR description LIKE '$search%' ");
?>


<?php
foreach ($calendarbdd as $calendar):
if (isset($calendar)):?>
<div>ID de l'évènement : <?=$calendar['id']; ?></div>
<div>Nom : <?=$calendar['name']; ?></div>
<div>Description :<br><?=$calendar['description']; ?></div>
<?php elseif (isset($calendar)): ?>

<?php endif;?>
<br><br>
<?php endforeach;?>
<div>Aucun évènement de ce nom n'a été trouvé</div>

<?php
session_start();
require_once ("header.php");



$data = [];
/*
 * Data est une variable qui permettra de garder le contenu du formulaire
 * si celui n'a pas pu s'envoyer afin de ré afficher la page d'erreur avec le formualire actuel.
*/

/* La methode d'envoi de cette page est POST pour envoyer le formulaire.
   La methode classique est GET.
   Ce qui veut dire que si on est arrivé sur cette page par la methode POST, le formulaire est incorrect
   et nous a redirigé ici
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    $erros = [];
    $validator = new EventValidator();
    $errors = $validator->validates($_POST);

    if (empty($errors)) {
        /*
         * Si la methode d'envoi rempli les conditions : on envoi à la bdd
         */
        $event = new \calendar\EventCalendar(null);
        $event->setName($data['name']);
        $event->setDescription($data['description']);
        $event->setStart(DateTime::createFromFormat('Y-m-d H:i', $data['date'].' '. $data['start'])
                ->format('Y-m-d H:i:s'));
        $event->setEnd(DateTime::createFromFormat('Y-m-d H:i', $data['date'].' '. $data['end'])
            ->format('Y-m-d H:i:s'));
        //var_dump($event);
        $events = new \modele\Events\Events();
        $events->create($event);
        header('Location: /calendar');
        exit();
    }
}
/*
 * Pour plus de condition de gestion des erreurs : vidéo 3 time stamp : 24min
 */

    /* recupération du formulaire de la ligue choisi */
    $choosenLeague = $_POST['league'];
    var_dump($choosenLeague);

?>

    <?php if (!empty($errors)):?>
        <div class="alert alert-danger">Merci de remplir les champs convenablement</div>
    <?php endif; ?>
<div class="container">
    <h1>Ajouter un évènement</h1>
    <form action="" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input id="name" type="text" required class="form-control" name="name" value="<?= isset($data['name']) ? $data['name'] : ''; ?>">
                    <?php if($errors['name']): ?>
                        <small class="form-text text-muted"><?=$errors['name']?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? $data['date'] : ''; ?>">
                    <?php if($errors['date']): ?>
                        <small class="form-text text-muted"><?=$errors['date']?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
        $room = new roomControlleur();
        $tabRoom = $room->getListRoomByLeague($choosenLeague);
        var_dump($tabRoom);
        ?>

        <div class="row">
            <div class="col-sm-6">
                <div class="dropdown">
                    <select id="league" name="league">
                        <?php foreach ($tabRoom as $var): ?>
                            <option value="$cpt"><?= $var['number'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start">Demarrage</label>
                    <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? $data['start'] : ''; ?>">
                    <?php if($errors['start']): ?>
                        <small class="form-text text-muted"><?=$errors['start']?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end">Fin</label>
                    <input id="end" type="time" required class="form-control" name="end" placeholder="HH:MM" value="<?= isset($data['end']) ? $data['end'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label form=""description">Description</label>
            <textarea name="Description" id="description" class="form-control" ><?= isset($data['description']) ? $data['description'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>



<?php require_once ("footer.php"); ?>
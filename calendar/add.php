<?php
require_once ("header.php");
?>
<div class="container">
    <h1>Ajouter un évènement</h1>
    <form action="" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input id="name" type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Date</label>
                    <input id="date" type="date" class="form-control" name="date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start">Demarrage</label>
                    <input id="start" type="time" class="form-control" name="start" placeholder="HH:MM">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end">Fin</label>
                    <input id="end" type="time" class="form-control" name="end" placeholder="HH:MM">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label form=""description">Description</label>
            <textarea name="Description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>



<?php require_once ("footer.php"); ?>
<div class="container">
    <h1>Ajouter une salle</h1>
    <form action="?action=room-addRoom" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="number">Numero de la salle</label>
                    <input id="number" type="number" required class="form-control" name="number">
                </div>
                <div class="form-group">
                    <label for="capacity">Capacité de la salle</label>
                    <input id="capacity" type="number" required class="form-control" name="capacity">
                </div>
            </div>
        </div>
        <div class="dropdown">
            <select id="league" name="league">
                    <?php
                    $league = new leagueControlleur();
                    $tab = $league->getListLeague();
                    ?>
                    <?php foreach ($tab as $var): ?>
                        <option><?= $var['name'];?></option>
                    <?php endforeach;?>

            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Ajouter une salle</button>
        </div>
    </form>
</div>
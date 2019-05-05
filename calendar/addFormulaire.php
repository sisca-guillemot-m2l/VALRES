<?php
    require_once 'header.php';
?>

<div class="container">
    <h1>Choisir une ligue</h1>
    <form action="add.php" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="connect">A quelle ligue souhaitez vous vous connecter ?</label>
                    <select id="league" name="league">
                        <?php
                        $league = new leagueControlleur();
                        $tabLeague = $league->getListLeague();                        $cpt = 0;
                        ?>
                        <?php foreach ($tabLeague as $var): ?>
                            <option id="test">
                                <?php
                                echo $var['name'];
                                ?></option>
                        <?php
                        endforeach;
                        ?>>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">League choisi</button>
            </div>
    </form>
</div>

<?php
require_once 'footer.php';
?>
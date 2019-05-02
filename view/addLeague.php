<div class="container">
    <h1>Ajouter une ligue</h1>
    <form action="?action=league-addLeague" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Nom de la ligue</label>
                    <input id="name" type="text" required class="form-control" name="name" placeholder="FC Ville">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input id="address" type="text" required class="form-control" name="address" placeholder="numero de rue / rue / ville / code postal" ">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Ajouter une ligue</button>
        </div>
    </form>
</div>

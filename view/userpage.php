<?php

?>

<link rel="stylesheet" href="../css/userPage.css">

<div class="container emp-profile">
    <form method="post">
        <div class="row">

            <div class="col-md-6">
                <div class="profile-head">
                    <!--
                    <h5>
                    </h6>
                    -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reservation</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--<div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>A PROPOS</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Information</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?= $_SESSION['id']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?= $_SESSION['name']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?= $_SESSION['email']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Numero adhérent</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?= $_SESSION['memberNum']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $_SESSION['phone']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p>Web Developer and Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--
<div class="container">
    <div class="row">
        <div id="col1" class="col-4">
            <a href="/ppetest/view/accessBuilding.php">Obtenir l'accès au batiment</a>
            <img id="maison" src="/ppetest/img/maison.png">
        </div>
        <div id="col2" class="col-4">
            <a href="/ppetest/mrbs/web/index.php">Gerer son planning</a>
            <img id="calendar" src="/ppetest/img/calendar.png">
        </div>

        <div id="profil" class="col-3"></div>
    </div>
</div>


<script>
    $("#col1").hide();
    $("#col2").hide();
    $("#profil").hide();
    var col5 = ($("#col1").width())/2;
    console.log ("TEST 1 ");
    $.post("/ppetest/modele/userData.php", {}, function (data) {
        console.log("test 2");
        $.post("/ppetest/modele/userStatut.php", {}, function (statut) {
            console.log("test 3");
            if (statut == "user")
            {
                $("#col2").show();
                $("#calendar").width(col5);
            }
            if (statut == "admin")
            {
                $("#col1").show();
                $("#col2").show();
                $("#maison").width(col5);
                $("#calendar").width(col5);
            }
            var dataArrow = data[0];
            $("#profil").show();
            $("#profil").html("<p>NOM : "+dataArrow['username']+"</p><br><p>EMAIL : "+dataArrow['email']+"</p><br><p>Rang : "+dataArrow['statut']+"</p>");
            $("#maison").click(function () {
                window.location.replace('/ppetest/view/accessBuilding.php');
            });
            $("#calendar").click(function () {
                window.location.replace('/ppetest/mrbs/web/index.php');
            });
            }, 'json');
    },'json');
</script>

-->
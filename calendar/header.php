<?php session_start();
    //var_dump($_SESSION['id']);
    //var_dump($_SESSION['name']);
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
    <a href="../root/" class="navbar-brand">Home</a>
    <a class='navbar-brand'><?= $_SESSION['name'];?></a>
</nav>
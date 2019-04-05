<?php
    session_start();

    define("PATHROOT", __DIR__);
    define("DS", DIRECTORY_SEPARATOR); // permet de mettre le / ou \ en fonction de linux ou windows
    define("PATHVIEW",PATHROOT.DS.'view'.DS);
    define("PATHMODELE", PATHROOT.DS.'modele'.DS);
    define("PATHCTRL",PATHROOT.DS.'controlleur.'.DS);
    define("PATHIMG", PATHROOT.DS.'img'.DS);
    define ("PATHTEST", PATHROOT.DS.'test'.DS);
    require PATHROOT.DS.'conf/ressource.php';
    require_once PATHROOT.DS.'vendor/autoload.php';

    function autoLoadController($controllerName) {
        if(file_exists(PATHCTRL.$controllerName.'.php')) {
            require_once PATHCTRL.$controllerName.'.php';
        }
    }

    function autoLoadTest ($testName) {
        if(file_exists(PATHTEST.$testName.'.php')) {
            require_once PATHCTRL.$testName.'.php';
        }
    }

    spl_autoload_register('autoLoadController');
    spl_autoload_register('autoLoadTest');

    $content = FILTER_INPUT(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $action = FILTER_INPUT(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    $link = FILTER_INPUT (INPUT_GET, 'href', FILTER_SANITIZE_STRING);

    if (!is_null($action))
    {
        $tabAction = explode ('-', $action);
        $controlleurName=$tabAction[0].'Controlleur';
        $methode=$tabAction[1];
        $controlleur = new $controlleurName();
        $controlleur->$methode();
    }
    //var_dump($action);
    if (isset ($_SESSION['id'])) {
        var_dump($_SESSION['id']);
        var_dump($_SESSION['statut']);
    }
    if (is_null($content))
    {
        $content = 'accueil';
    }


    include 'view/page.php';
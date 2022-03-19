<?php

    require_once '../vendor/autoload.php';
    session_start();

    if(!isset($_POST['check'])){
        header("Location: ../");
        exit;
    }
    
    $index = $_SESSION['usuario']['player_list']['index'];

    echo $index;

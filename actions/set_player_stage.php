<?php

    require_once '../vendor/autoload.php';

    session_start();

    if(!isset($_POST['stage']) || !isset($_SESSION['usuario'])){
        header("Location: ../");
        exit;
    }

    $player_stage = $_POST['stage'];
    $_SESSION['usuario']['player_list']['stage'] = $player_stage;


?>
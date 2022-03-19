<?php

    require_once '../vendor/autoload.php';

    session_start();

    if(!isset($_POST['index']) || !isset($_SESSION['usuario'])){
        header("Location: ../");
        exit;
    }
    
    $song_index = $_POST['index'];
    $_SESSION['usuario']['player_list']['index'] = $song_index;

?>
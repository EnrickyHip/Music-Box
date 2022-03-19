<?php

    require_once '../vendor/autoload.php';

    session_start();

    if(!isset($_POST['songs']) || !isset($_SESSION['usuario'])){
        header("Location: ../");
        exit;
    }
    
    $song_info = $_POST['songs'];

    if (!$song_info) {
        require_once 'includes/song_error.php';
    }
    else {
        $list = json_decode($song_info);
        $_SESSION['usuario']['player_list']['songs'] = $list;
    }

?>
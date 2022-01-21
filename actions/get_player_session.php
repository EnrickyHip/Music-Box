<?php

    require_once '../vendor/autoload.php';
    session_start();

    if(!isset($_POST['check']) || !isset($_SESSION['usuario'])){
        header("Location: ../");
        exit;
    }
    
    else {

        if(!isset($_SESSION['usuario']['player_list'])){
            $_SESSION['usuario']['player_list']['songs'] = [];
            $_SESSION['usuario']['player_list']['index'] = 0;
        }

        $list = $_SESSION['usuario']['player_list'];

        $list_json = json_encode($list);

        echo $list_json;
        
    }

?>
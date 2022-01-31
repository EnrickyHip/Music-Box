<?php

    require_once '../vendor/autoload.php';
    session_start();

    if(!(isset($_POST['check'])) or !(isset($_SESSION['usuario']))){
        echo false;
        exit;
    }
    
    else {

        if(!isset($_SESSION['usuario']['player_list'])){
            $_SESSION['usuario']['player_list']['songs'] = [];
            $_SESSION['usuario']['player_list']['index'] = 0;
            $_SESSION['usuario']['player_list']['stage'] = "closed";
        }

        $list = $_SESSION['usuario']['player_list'];

        $list_json = json_encode($list);

        echo $list_json;
        
    }

?>
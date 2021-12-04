<?php

    session_start();
    $temp = filter_input(INPUT_GET, 't');
    if(!$temp){
        require_once "templates/main.php";
    }elseif($temp = "register"){
        require_once "templates/logoOnly.php";
    }
    
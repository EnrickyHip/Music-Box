<?php
    $temp = filter_input(INPUT_GET, 't');

    if(!$temp){
        require_once "templates/main.php";

    }
    else if($temp = "register"){
        require_once "templates/logoOnly.php";
    }
    
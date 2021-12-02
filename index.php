<?php
    $temp = filter_input(INPUT_GET, 't');
    if(!$temp){
        require_once "templates/template_default.php";
    }elseif($temp = "register"){
        require_once "templates/register.php";
    }
    
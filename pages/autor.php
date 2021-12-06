<?php

    use classes\model\Login;

    require_once 'vendor/autoload.php';

    $autor = filter_input(INPUT_GET, 'a');

    $user_autor = Login::get_user_info($autor);
    $username_autor = $user_autor[0]['username'];

    if (!$user_autor){
        require "includes/autor_error.php";
    }
    else {

        if ($self_username == $username_autor){
            require "includes/autor_self.php";
        }
        else {
            require "includes/autor_other.php";
        }   
    }
    
?>
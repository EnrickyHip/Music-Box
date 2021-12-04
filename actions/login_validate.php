<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['user_name'])){

        $user = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $login_ctrl = new \classes\controler\Login_ctrl($user, '');
        $login_ctrl->check_exists_user();
    }

    else{
        header("Location: ../");
        exit();
    }
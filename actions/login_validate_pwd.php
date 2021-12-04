<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['user_name'], $_POST['pass_word'] )){

        $user = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "pass_word");
        
        $login_ctrl = new \classes\controler\Login_ctrl($user, $password);
        $login_ctrl->check_pwd();
    }

    else{
        header("Location: ../");
        exit();
    }
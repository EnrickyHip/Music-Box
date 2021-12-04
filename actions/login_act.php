<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['login'])){

        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
        $pwd = filter_input(INPUT_POST, "pwd");

        $login_ctrl = new \classes\controler\Login_ctrl($user, $user, $pwd);
        $user = $login_ctrl->get_user_info($user);
        $login_ctrl->login_user($user);
    }

    else{
        header("Location: ../");
        exit();
    }
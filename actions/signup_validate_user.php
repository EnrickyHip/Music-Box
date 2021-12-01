<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['user_name'])){

        $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS);

        $signup_ctrl = new \classes\controler\Signup_ctrl($username, '', ''); 
        $signup_ctrl->check_exists_user();
    }

    else{
        header("Location: ../register.php");
        exit();
    }
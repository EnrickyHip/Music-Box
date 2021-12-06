<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['register'])){

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pwd = filter_input(INPUT_POST, "pwd");

        $signup_ctrl = new \classes\controler\Signup_ctrl($username, $email, $pwd); 
        $signup_ctrl->create_user();
    }

    else{
        header("Location: ../register.php");
        exit();
    }
<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['register'])){

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
        $c_pwd = filter_input(INPUT_POST, "c_pwd", FILTER_SANITIZE_STRING);

        $signup_ctrl = new \classes\controler\Signup_ctrl($name, $email, $pwd, $c_pwd); 

    }

    else{
        header("Location: ../register.php");
        exit();
    }
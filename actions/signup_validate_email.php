<?php

    include_once "../vendor/autoload.php";

    if (isset($_POST['email_'])){

        $email = filter_input(INPUT_POST, "email_", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $signup_ctrl = new \classes\controler\Signup_ctrl('', $email, ''); 
        $signup_ctrl->check_exists_email();
    }

    else{
        header("Location: ../register.php");
        exit();
    }
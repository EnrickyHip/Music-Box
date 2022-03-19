<?php

   // este arquivo recebe o formulário de registro

    include_once "../vendor/autoload.php";

    if (!isset($_POST['username'])){ // testa se o formuçário foi enviado
        header("Location: ../?t=logoOnly&p=register"); //retorna para a página de registro caso o usuário não tenha enviado o formulário
        exit();
    }

    else {
        //recebe as variáveis
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pwd = filter_input(INPUT_POST, "pwd");

        //instancia o controle e cria o usuário
        $signup_ctrl = new \classes\controler\SignupControler($username, $email, $pwd); 
        $signup_ctrl->create_user();
    }
<?php

    // esse arquivo recebe a requisição do ajax para testar se o username já existe para que o usuário possa se registrar

    include_once "../vendor/autoload.php";

    if (!isset($_POST['user_name'])){//testa se a requisição foi feita
        header("Location: ../register.php");// retorna o usuário para a página de registro caso a requisição não seja feita
        exit();
    }

    else{
        $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS);

         //instancia o controle e checa se o username já existe
        $signup_ctrl = new \classes\controler\SignupControler($username, '', ''); 
        $signup_ctrl->check_exists_user();
    }
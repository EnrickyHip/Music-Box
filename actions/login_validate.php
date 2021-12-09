<?php

    //este arquivo recebe a requisição ajax(validate_login.js) a fim de testar se o usuário ou o email digitados existem no banco de dados

    include_once "../vendor/autoload.php";

    if (isset($_POST['user_name'])){ //  testa se a variável POST da requisição ajax está setada

        $user = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS); // recebe a variável
        
        $login_ctrl = new \classes\controler\Login_ctrl($user, ''); // instancia o controle de login
        $login_ctrl->check_exists_user(); //checa se o usuário digitado existe.
    }

    else{
        header("Location: ../"); // se a variável não existir o usuário retrona ao menu principal
        exit();
    }
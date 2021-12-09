<?php

    //este arquivo recebe a requisição ajax(validate_login.js)para testar se a senha digitada pelo usuário coincide com a senha no banco de dados

    include_once "../vendor/autoload.php";

    if (isset($_POST['user_name'], $_POST['pass_word'] )){ // testa se as variáveis que vem da requisição ajax estão setadas

        $user = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS); //recebe as variáveis do ajax
        $password = filter_input(INPUT_POST, "pass_word");
        
        $login_ctrl = new \classes\controler\Login_ctrl($user, $password); // instancia o controle de login
        $login_ctrl->check_pwd(); // checa se as senhas coincidem
    }

    else{
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }
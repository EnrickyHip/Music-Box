<?php

    // este arquivo recebe o action do formulário de login

    include_once "../vendor/autoload.php";

    if (isset($_POST['login'])){ // testa se o formulário de login foi enviado

        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS); // recebe os inputs de login
        $pwd = filter_input(INPUT_POST, "pwd");

        $login_ctrl = new \classes\controler\Login_ctrl($user, $user, $pwd); // instancia a classe de controle do login
        $user = $login_ctrl->get_user_info($user); // recebe as informações do usuário
        $login_ctrl->login_user($user); // loga o usuário
    }

    else{ // caso o login não seja enviado, o usuário é redirecionado ao menu principal
        header("Location: ../");
        exit();
    }
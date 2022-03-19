<?php

    // este arquivo recebe o action do formulário de login

    include_once "../vendor/autoload.php";

    if (!isset($_POST['user'])){ // testa se o formulário de login foi enviado
        header("Location: ../");
        exit();
    }
    // caso o login não seja enviado, o usuário é redirecionado ao menu principal

    $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS); // recebe os inputs de login
    $pwd = filter_input(INPUT_POST, "pwd");

    $login_ctrl = new \classes\controler\LoginControler($user, $user, $pwd); // instancia a classe de controle do login
    $login_ctrl->login_user($user); // loga o usuário ps: envia o username OU email
    header('Location: ../?error=0');

<?php

   // este arquivo recebe o formulário de edição de perfil
   session_start();

    include_once "../vendor/autoload.php";

    if (isset($_POST['send_profile_info'])){ // testa se o formuçário foi enviado

        //recebe as variáveis
        $user_id = $_SESSION['usuario']['id'];
        $art_name = filter_input(INPUT_POST, "art_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $bio = filter_input(INPUT_POST, "bio", FILTER_SANITIZE_SPECIAL_CHARS);
        $website = filter_input(INPUT_POST, "website", FILTER_SANITIZE_SPECIAL_CHARS);
        $local = filter_input(INPUT_POST, "local", FILTER_SANITIZE_SPECIAL_CHARS);

        //instancia o controle e edita as informações do usuário
        $signup_ctrl = new \classes\controler\Edit_ctrl($user_id, $art_name, $username, $bio, $website, $local); 
        $signup_ctrl->edit_user();
    }

    else{
        header("Location: ../?p=autor&a=".$self_username."&e=true&error=true"); //retorna para a página de registro caso o usuário não tenha enviado o formulário
        exit();
    }
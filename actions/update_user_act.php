<?php

   // este arquivo recebe o formulário de edição de perfil
   session_start();

    include_once "../vendor/autoload.php";

    if (!isset($_POST['username'])){ // testa se o formuçário foi enviado
        header("Location: ../?p=autor&a=".$self_username."&e=true&error=true"); //retorna para a página de registro caso o usuário não tenha enviado o formulário
        exit();
    }

    //recebe as variáveis
    $user_id = $_SESSION['usuario']['id'];
    $art_name = filter_input(INPUT_POST, "art_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $bio = filter_input(INPUT_POST, "bio", FILTER_SANITIZE_SPECIAL_CHARS);
    $website = filter_input(INPUT_POST, "website", FILTER_SANITIZE_SPECIAL_CHARS);
    $local = filter_input(INPUT_POST, "local", FILTER_SANITIZE_SPECIAL_CHARS);
    $foto = $_FILES['inputFile'];

    if($bio === ""){
        $bio = null;
    }

    if($website === ""){
        $website = null;
    }

    if($local === ""){
        $local = null;
    }

    //instancia o controle e edita as informações do usuário
    $edit_ctrl = new \classes\controler\EditControler($user_id, $art_name, $username, $bio, $website, $local, $foto); 
    $edit_ctrl->edit_user();
    
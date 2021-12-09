<?php

    // este arquivo recebe o formulário enviado com a foto de perfil do usuário

    require_once '../vendor/autoload.php';
    
    session_start();

    if (isset($_SESSION['usuario'])){ // testa se o usuário está logado
        if (isset($_POST['send_profile_img'])){ // testa se o formulário com a foto de perfil foi enviado

            // recebe as variáveis
            $self_username = $_SESSION['usuario']['username'];
            $self_id = $_SESSION['usuario']['id'];
            $foto = $_FILES['inputFile'];
            
            //instancia o controle de foto de perfil e atualiza ela
            $profile_img = new \classes\controler\Profile_img_ctrl($self_id);
            $profile_img->set_profile_img($foto, $self_username);
        }
        else {
            header('Location: ../'); //se o formulario não for enviado o usuário retorna ao menu
            exit();
        }
    }
    else {
        header('Location: logout.php'); // encerra a sessão caso o usuário não esteja logado
        exit();
    }

<?php

    require_once 'vendor/autoload.php';

    
    session_start();

    if (isset($_SESSION['usuario'])){ // testa se o usuário está logado
        if (isset($_FILES['upload_song_input'])){ // testa se o formulário com a foto de perfil foi enviado

            /*$self_username = $_SESSION['usuario']['username'];
            $self_id = $_SESSION['usuario']['id'];*/
            $song = $_FILES['upload_song_input'];

            require_once "includes/song_register_inc.php";


            /*$upload_song = new \classes\controler\SongControler($self_id);
            $upload_song->uploadSong($song);*/
        }
        else {
            header('Location: /'); //se o formulario não for enviado o usuário retorna ao menu
            exit();
        }
    }
    else {
        header('Location: actions/logout.php'); // encerra a sessão caso o usuário não esteja logado
        exit();
    }
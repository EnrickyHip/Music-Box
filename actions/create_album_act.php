<?php

    //este arquivo recebe o formulário de cadastramento de álbuns

    require_once "../vendor/autoload.php";

    session_start();

    if(!isset($_POST['create_album_submit'])){
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    $user_id = $_SESSION['usuario']['id'];
    $username = $_SESSION['usuario']['username'];
    $title = filter_input(INPUT_POST, "album_title_input", FILTER_SANITIZE_SPECIAL_CHARS);
    $cover = $_FILES['album_cover'];
    $about = filter_input(INPUT_POST, "album_desc", FILTER_SANITIZE_SPECIAL_CHARS);

    if (!isset($_POST['album_songs'])){
        $songs = [];
    }
    else {
        $songs = $_POST['album_songs'];
    }

    $album_ctrl = new \classes\controler\AlbumControler($user_id);
    $album_ctrl->create_album($songs, $title, $cover, $about);
    header("Location: ../?p=autor&a=$username");
    

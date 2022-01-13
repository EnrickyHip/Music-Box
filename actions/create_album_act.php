<?php

    require_once "../vendor/autoload.php";

    session_start();

    if(!isset($_POST['create_album_submit'])){
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    else {
        $user_id = $_SESSION['usuario']['id'];
        $title = $_POST['album_title_input'];
        $songs = []; //ISTO É TEMPORÁRIO!
        $cover = $_FILES['album_cover'];
        $about = $_POST['album_desc'];

        if ($cover['size'] == 0){
            $cover = "album_covers/default-cover-art.png";
        }

        $album_ctrl = new \classes\controler\AlbumControler($user_id);
        $album_ctrl->create_album($songs, $title, $cover, $about);
        header("Location: ../?error=tudocerto");
    }
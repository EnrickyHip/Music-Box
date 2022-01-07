<?php

    require_once "../vendor/autoload.php";

    session_start();

    if(!isset($_POST['song_file'])){
        die("ué");
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    else {
        $song = $_SESSION['actual_song'];
        $user_id = $_SESSION['usuario']['id'];
        $album = $_POST['album_select'];

        $upload_song = new \classes\controler\SongControler($user_id);
        $upload_song->uploadSong($song, $album);
    }
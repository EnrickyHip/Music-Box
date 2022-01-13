<?php

    require_once "../vendor/autoload.php";

    session_start();
    use classes\model\Album;

    if(!isset($_POST['song_file'])){
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    else {
        $song = $_SESSION['actual_song'];
        $user_id = $_SESSION['usuario']['id'];
        $visibility = $_POST['visibility'];
        $song_title = $_POST['song_title'];
        $album_title = $_POST['album_select'];
        $album = Album::get_album_info('', $album_title);

        $upload_song = new \classes\controler\SongControler($user_id);
        $upload_song->uploadSong($song, $album, $visibility, $song_title);
    }
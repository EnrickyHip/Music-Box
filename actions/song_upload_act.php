<?php

    require_once "../vendor/autoload.php";
    use classes\model\AlbumModel;

    session_start();

    if(!isset($_POST['song_file'])){
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    else {
        $song = $_SESSION['actual_song'][0]; //esta variavel recebe o arquivo da música guardada na sessão actual_song, criada na song register
        $user_id = $_SESSION['usuario']['id'];
        $visibility = $_POST['visibility'];
        $song_title = filter_input(INPUT_POST, "song_title", FILTER_SANITIZE_SPECIAL_CHARS);
        $song_desc = filter_input(INPUT_POST, "song_desc", FILTER_SANITIZE_SPECIAL_CHARS);
        $genre = $_POST['genre_select'];

        if(isset($_POST['subgenre_select'])){
            $subgenre = $_POST['subgenre_select'];
        }
        else{
            $subgenre = 'nenhum';
        }

        if(isset($_POST['subgenre_select'])){
            $key = $_POST['key_select'];
        }
        else{
            $key = 'nenhum';
        }
        
        $album_title = $_POST['album_select'];
        $album = AlbumModel::get_album_info($album_title, '*');

        $upload_song = new \classes\controler\SongControler($user_id);
        $upload_song->uploadSong($song, $album, $visibility, $song_title, $song_desc, $genre, $subgenre, $key);
    }
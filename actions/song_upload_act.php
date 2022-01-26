<?php

    require_once "../vendor/autoload.php";

    session_start();

    if(!isset($_POST['song_file'])){
        header("Location: ../"); // caso as variáveis não estejam setadas, o usuário retorna a página principal.
        exit();
    }

    else {
        $song_code_name = $_POST['song_code_name'];

        $song = $_SESSION[$song_code_name]['file_info']; //esta variavel recebe o arquivo da música guardada na sessão actual_song, criada na song register
        $user_id = $_SESSION['usuario']['id'];
        $visibility = $_POST['visibility'];
        $song_title = filter_input(INPUT_POST, "song_title", FILTER_SANITIZE_SPECIAL_CHARS);
        $song_desc = filter_input(INPUT_POST, "song_desc", FILTER_SANITIZE_SPECIAL_CHARS);
        $genre = $_POST['genre_select'];

        if(isset($_POST['subgenre_select'])){
            $subgenre = $_POST['subgenre_select'];
        }
        else{
            $subgenre = null;
        }

        if ($visibility == "true"){
            $visibility = true;
        }
        else {
            $visibility = false;
        }

        if($_POST['album_select'] == "solo"){
            $album_id = false;
        }
        else {
            $album_id = (int)$_POST['album_select'];
        }
        

        $upload_song = new \classes\controler\SongControler($user_id);
        $upload_song->uploadSong($song, $album_id, $visibility, $song_title, $song_desc, $genre, $subgenre, $song_code_name);

        $_SESSION[$song_code_name] = null;
        
        header("Location: ../?p=song&s=$song_code_name&e=true");
        exit();
    }
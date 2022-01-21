<?php

    use classes\model\SongModel;

    require_once '../vendor/autoload.php';

    if(!isset($_POST['song_code_name'])){
        header("Location: ../");
        exit;
    }
    
    else {

        $song_code_name = $_POST['song_code_name'];
        $song_info = SongModel::get_song_info($song_code_name, '*');

        if (!$song_info) {
            require_once 'includes/song_error.php';
        }
        else {
            $song = new \classes\objects\SongObject($song_info);
            echo $song->encode();
        }
    }

?>
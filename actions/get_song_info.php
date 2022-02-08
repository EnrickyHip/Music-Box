<?php

    use classes\model\SongModel;

    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    if(!isset($_POST['song_code_name'])){
        echo "deu erro";
        exit;
    }
    
    else {

        $songs = [];
        $songs_code_name = $_POST['song_code_name'];

        foreach($songs_code_name as $song_codename){

            $song_info = SongModel::get_song_info($song_codename, '*');

            if (!$song_info) {
                require_once '../includes/song_error.php';
            }

            else {
                $song = new \classes\objects\SongObject($song_info);
                
                array_push($songs, $song->get_player_info());
            }
        }
        
        echo json_encode($songs);

    }

?>
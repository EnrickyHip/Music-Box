<?php

    use classes\model\SongModel;

    require_once 'vendor/autoload.php';

    $song_code_name = filter_input(INPUT_GET, 's');
    $edit = filter_input(INPUT_GET, 'e');
    

    $song_info = SongModel::get_song_info($song_code_name, '*');

    if (!$song_info) {
        require_once 'includes/song_error.php';
        exit;
    }

    /*print_r($_SESSION['usuario']['player_list']);
    die;*/

    $song = new \classes\objects\SongObject($song_info);

    if (isset($self_user)){
        if ($self_user->get_username() === $song->get_autor_username() and $edit === "true"){ 
            require "includes/song_edit.php"; 
        }
        else {
            require "includes/song_inc.php";
        } 
    }
    else{
        require "includes/song_inc.php";
    }
?>
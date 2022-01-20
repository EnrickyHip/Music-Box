<?php
    session_start();

    $song_code_name = filter_input(INPUT_GET, 's');

    unlink($_SESSION[$song_code_name]['file_path']);
    $_SESSION[$song_code_name] = null;
    header("Location: ../");

//este arquivo serve pra resetar o $_SESSION['actual_song'], criado na song_register.php
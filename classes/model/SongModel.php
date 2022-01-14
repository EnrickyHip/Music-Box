<?php

    namespace classes\model;

    class SongModel extends Database{
        
        function insert_song($code_name, $song_title,  $song_file, $visibility, $user_id, $album_id){

            $stmt = $this->connect()->prepare("INSERT INTO song (code_name, title, file_dir, privacity, autor_id, album_id) VALUES(?,?,?,?,?,?);");

            if (!$stmt->execute(array($code_name, $song_title,  $song_file, $visibility, $user_id, $album_id))) { // executa e testa se há erros
                header("Location: ../?error=instertSongerror");
                exit();
            }
            else{
                header("Location: ../?error=pronto!");
                exit();
            }
        }
    }
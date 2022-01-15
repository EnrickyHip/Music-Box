<?php

    namespace classes\model;

    class SongModel extends Database{
        
        public function insert_song($code_name, $song_title,  $song_file, $visibility, $user_id, $album_id, $song_desc, $genre, $subgenre, $key){

            $stmt = $this->connect()->prepare("INSERT INTO song (code_name, title, file_dir, privacity, autor_id, album_id, about, genre, sub_genre, song_key) VALUES(?,?,?,?,?,?,?,?,?,?);");

            if (!$stmt->execute(array($code_name, $song_title,  $song_file, $visibility, $user_id, $album_id, $song_desc, $genre, $subgenre, $key))) { // executa e testa se há erros
                header("Location: ../?error=instertSongerror");
                exit();
            }
            else{
                header("Location: ../?p=song&s=$code_name");
                exit();
            }
        }


        public static function get_song($code_name){
            $stmt = self::connect()->prepare('SELECT * FROM song WHERE code_name = ?;');//conecta com o banco de dados e prepara a execução

            if (!$stmt->execute(array($code_name))){ // executa e testa se há erros
                $stmt = null;
                header("Location: ../login_page.php?error=stmtError");
                exit();
            }  

            if ($stmt->rowCount() > 0){

                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
            else {
                return false;
            }
        }

        public static function get_album_info($album, $column){

            $stmt = self::connect()->prepare('SELECT '.$column.' FROM album WHERE album_id = ?;');//conecta com o banco de dados e prepara a execução

            if (!$stmt->execute(array($album))) { // executa e testa se há erros

                $stmt = null;
                header("Location: ../login_page.php?error=stmtError");
                exit();
            }  

            if ($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
            else {
                return false;
            }
        }
    }
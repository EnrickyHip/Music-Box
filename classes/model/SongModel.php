<?php

    namespace classes\model;

    class SongModel extends Database{
        
        public function insert_song($code_name, $song_title,  $song_file, $visibility, $single, $user_id, $album_id, $song_desc, $genre, $subgenre, $key){

            $stmt = $this->connect()->prepare("INSERT INTO song (code_name, title, file_dir, visibility, single, autor_id, album_id, about, genre, sub_genre, song_key) VALUES(?,?,?,?,?,?,?,?,?,?,?);");

            if (!$stmt->execute(array($code_name, $song_title,  $song_file, $visibility, $single, $user_id, $album_id, $song_desc, $genre, $subgenre, $key))) { // executa e testa se há erros
                header("Location: ../?error=instertSongerror");
                exit();
            }
        }


        public static function get_song_info($code_name, $column){
            $stmt = self::connect()->prepare("SELECT $column FROM song WHERE code_name = ?;");//conecta com o banco de dados e prepara a execução

            if (!$stmt->execute(array($code_name))){ // executa e testa se há erros
                $stmt = null;
                header("Location: ../login_page.php?error=stmtError");
                exit();
            }  

            if ($stmt->rowCount() > 0){

                return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0]; 
            }
            else {
                return false;
            }
        }

        public static function get_solo_songs($autor_id){ //retorna todos os albuns do usuário, caso o usuário não tenha albuns cadastrados, retornará false.
            $stmt = self::connect()->prepare("SELECT * FROM song WHERE single = 1 AND autor_id = ?;");

            if (!$stmt->execute(array($autor_id))) { // executa e testa se há erros
                header("Location: ../?error=getalbunserror");
                exit();
            }
            else if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
            else {
                return false;
            }
        }

        protected function update_album($song, $single, $album_id){

            $stmt = self::connect()->prepare("UPDATE song SET album_id = ?, single = ? WHERE code_name = ?;");

            if (!$stmt->execute(array($album_id, $single, $song))) { // executa e testa se há erros
                header("Location: ../?error=getalbunserror");
                exit();
            }
        }
    }
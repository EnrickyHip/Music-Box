<?php

    namespace classes\model;
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class Album extends Database{

        protected function insert_album($user_id, $playlist_code_name, $title, $single, $about, $cover_dir){

            $stmt = $this->connect()->prepare("INSERT INTO album (owner_id, playlist_code_name, title, single, about, cover_dir) VALUES(?,?,?,?,?,?);");

            if (!$stmt->execute(array($user_id, $playlist_code_name, $title, $single, $about, $cover_dir))) { // executa e testa se há erros
                header("Location: ../?error=insteralbumerror");
                exit();
            }
            else {
                $album_id = $this->connect()->lastInsertId();

                return $album_id;
            }
        }

        protected function get_all_albuns($user_id){
            $stmt = $this->connect()->prepare("SELECT * FROM album WHERE owner_id = ? AND single = ?;");

            if (!$stmt->execute(array($user_id, false))) { // executa e testa se há erros
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

        public static function get_album_info($id, $title){

            $stmt = self::connect()->prepare("SELECT * FROM album WHERE id = ? OR title = ?;");

            if (!$stmt->execute(array($id, $title))) { // executa e testa se há erros
                header("Location: ../?error=albunGetInfoerror");
                exit();
            }
            else {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
        }
    }
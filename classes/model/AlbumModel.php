<?php

    namespace classes\model;
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //esse model recebe instancias de mais um local relativo, portanto, esse require requere o autoload a partir do caminho absoluto.

    class AlbumModel extends Database{

        protected function insert_album($user_id, $playlist_code_name, $title, $single, $about, $cover_dir){

            $stmt = $this->connect()->prepare("INSERT INTO album (owner_id, playlist_code_name, title, single, about, cover_dir) VALUES(?,?,?,?,?,?);");

            if (!$stmt->execute(array($user_id, $playlist_code_name, $title, $single, $about, $cover_dir))) { // executa e testa se há erros
                header("Location: ../?error=insteralbumerror");
                exit();
            }

            return $this->connect()->lastInsertId();

        }

        protected function get_all_albuns($user_id){ //retorna todos os albuns do usuário, caso o usuário não tenha albuns cadastrados, retornará false.
            $stmt = $this->connect()->prepare("SELECT * FROM album WHERE owner_id = ? AND single = ?;");

            if (!$stmt->execute(array($user_id, false))) { // executa e testa se há erros
                header("Location: ../?error=getalbunserror");
                exit();
            }
            
            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
            
            return false;
        }

        public static function get_album_info($album, $column){ // retorna as informações do álbum em um array associativo

            $stmt = self::connect()->prepare("SELECT ".$column." FROM album WHERE id = ? OR title = ?;");

            if (!$stmt->execute(array($album, $album))) { // executa e testa se há erros
                header("Location: ../?error=albunGetInfoerror");
                exit();
            }
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0]; 
        }

        protected function delete($album_id){
            $stmt = self::connect()->prepare("DELETE FROM album WHERE id = ?;");

            if (!$stmt->execute(array($album_id))) { // executa e testa se há erros
                header("Location: ../?error=albunGetInfoerror");
                exit();
            }
        }

        protected function update_album($title, $single, $about, $cover, $album_id){
            $stmt = self::connect()->prepare(

                "UPDATE album SET 
                            title = ?,
                            single = ?,
                            about = ?,
                            cover_dir = ?                                            
                WHERE id = ?;"
                );


            if (!$stmt->execute(array($title, $single, $about, $cover, $album_id))) { // executa e testa se há erros
                header("Location: ../?error=getalbunserror");
                exit();
            }
        }
    }
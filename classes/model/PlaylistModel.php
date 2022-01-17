<?php

    namespace classes\model;

    use classes\model\Database;

    require_once '../vendor/autoload.php';

    class PlaylistModel extends Database{
                     
        protected function insert_playlist($code_name, $title, $owner_id){

            $stmt = $this->connect()->prepare('INSERT INTO playlist (code_name, privacity, title, owner_id) VALUES (?,?,?,?);');

            if (!$stmt->execute(array($code_name, true, $title, $owner_id))) {

                $stmt = null;
                header("Location: ../../?error=playliststmtError"); //apenas para testes
                exit();
            }
        }

        protected function add_songs($playlist_code_name, $songs){
           
            foreach($songs as $song){
                $oi = "1"; //temporário obviamente
            }
            
        }

        public static function get_playlist_info($code_name){

        }
    }
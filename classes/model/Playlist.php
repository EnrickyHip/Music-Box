<?php

    namespace classes\model;

    use classes\model\Database;

    require_once '../vendor/autoload.php';

    class Playlist extends Database{
                     
        protected function insert_playlist($code_name, $title, $owner_id){

            $stmt = $this->connect()->prepare('INSERT INTO playlist (privacity, code_name, title, onwer_id) VALUES (?,?,?,?)');

            if (!$stmt->execute(array(true, $code_name, $title, $owner_id))) {

                $stmt = null;
                header("Location: ../../?error=stmtError"); //apenas para testes
                exit();
            }
        }

        protected function add_songs($playlist_code_name, $songs){
           
            foreach($songs as $song){
                
            }
            
        }

        public static function get_playlist_info($code_name){

        }
    }
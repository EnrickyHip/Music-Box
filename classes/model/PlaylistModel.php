<?php

    namespace classes\model;

    use classes\model\Database;

    require_once '../vendor/autoload.php';

    class PlaylistModel extends Database{
                     
        protected function insert_playlist($code_name, $title, $owner_id, $visibility, $favorite){

            $stmt = $this->connect()->prepare('INSERT INTO playlist (code_name, visibility, favorite, title, owner_id) VALUES (?,?,?,?,?);');

            if (!$stmt->execute(array($code_name, $visibility, $favorite, $title, $owner_id))) {

                $stmt = null;
                header("Location: ../../?error=playliststmtError"); //apenas para testes
                exit();
            }
        }

        protected function add_songs($playlist_code_name, $songs){
           
            foreach($songs as $song){

                $stmt = $this->connect()->prepare('INSERT INTO playlist_songs (playlist_id, song_id) VALUES (?,?);');

                if (!$stmt->execute(array($playlist_code_name, $song))) {

                    $stmt = null;
                    header("Location: ../../?error=playliststmtError"); //apenas para testes
                    exit();
                }
            }
        }

        protected function remove_songs($playlist_code_name, $songs){
            foreach($songs as $song){

                $stmt = $this->connect()->prepare("DELETE FROM playlist_songs WHERE playlist_id = ? AND song_id = ?;");

                if (!$stmt->execute(array($playlist_code_name, $song))) {

                    $stmt = null;
                    header("Location: ../../?error=playliststmtError"); //apenas para testes
                    exit();
                }
            }
        }

        public static function get_playlist_info($code_name){
        }
    }
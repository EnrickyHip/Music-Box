<?php

    namespace classes\controler;

    use \classes\model\Song;

    require_once '../vendor/autoload.php';

    class SongControler extends Song{

        private $user_id;
        private $formatos;
        
        public function __construct($user_id){

            $this->user_id = $user_id;
            $this->formatos = array("mp3", "aac", "wav", "ogg", "wma");
        }

        public function uploadSong($song, $album, $visibility, $song_title){

            $ext = pathinfo($song['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $this->formatos)){

                if ($song['error'] === 0){
                    
                    $song_file_name = $_SESSION['actual_song'][1];
                    $song_file = "songs/".$song_file_name; // define a pasta de upload
                    $temporario = "../temp_songs/".$song_file_name; //pasta temporária
                    rename($temporario, "../$song_file");// move o arquivo do local temoporario para a pasta
                    unlink($temporario);

                    if(!$album){
                        $album_id = $this->createSoloAlbum($song_title);
                    }
                    else {
                        $album_id = $album[0]['id'];
                    }

                    $code_name = uniqid('', true);
                    $this->insert_song($code_name, $song_title,  $song_file, $visibility, $this->user_id, $album_id);
                }
            else {
                die("deu erro meu bom");
            }
            }   
        }

        private function createSoloAlbum($song_title){
            $songs = "Solo";
            $album_control = new \classes\controler\AlbumControler($this->user_id);
            $title = $song_title;
            $cover_dir = "album_covers/default-cover-art.png";
            $about = "";
            $album_id = $album_control->create_album($songs, $title, $cover_dir, $about);
            return $album_id;
        }
    }
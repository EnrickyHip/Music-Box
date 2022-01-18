<?php

    namespace classes\controler;

    use \classes\model\SongModel;

    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class SongControler extends SongModel{

        private $user_id;
        private $formatos;
        
        public function __construct($user_id){

            $this->user_id = $user_id;
            $this->formatos = array("mp3", "aac", "wav", "ogg", "wma");
        }

        public function uploadSong($song, $album_id, $visibility, $song_title, $song_desc, $genre, $subgenre, $key){

            $ext = pathinfo($song['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $this->formatos)){

                if ($song['error'] === 0){
                    
                    $song_file_name = $_SESSION['actual_song'][1]; //$_SESSION['actual_song'][1] refere-se ao nome do arquivo, $_SESSION['actual_song'] é um array com as informações da música, foi criado em song_register.
                    $song_file = "songs/".$song_file_name; // define a pasta de upload
                    $temporario = "../temp_songs/".$song_file_name; //pasta temporária
                    rename($temporario, "../$song_file");// move o arquivo do local temoporario para a pastas

                    if(!$album_id){ //caso o usuário não tenha selecionado álbum, o sistema irá criar um solo para a música
                        $album_id = $this->createSoloAlbum($song_title);
                        $single = true;
                    }
                    else {
                        $single = false;
                    }

                    $code_name = uniqid('', true);
                    $this->insert_song($code_name, $song_title,  $song_file, $visibility, $single, $this->user_id, $album_id, $song_desc, $genre, $subgenre, $key);
                }
                else {
                    die("deu erro meu bom");
                }
            }   
        }

        private function createSoloAlbum($song_title){ //cria o album solo
            $songs = "Solo";
            $album_control = new \classes\controler\AlbumControler($this->user_id);
            $title = $song_title;
            $cover_dir = "album_covers/default-cover-art.png";
            $about = "";
            $album_id = $album_control->create_album($songs, $title, $cover_dir, $about);
            return $album_id;
        }

        public function get_all_solo_songs(){
            $songs = $this->get_solo_songs();
            return $songs;
        }
    }
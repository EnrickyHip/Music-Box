<?php

    namespace classes\controler;

    use \classes\model\Song;

    require_once '../vendor/autoload.php';

    class SongControler extends Song{

        private $formatos;
        private $user_id;
        
        public function __construct($user_id){

            $this->$user_id = $user_id;
            $this->formatos = array("mp3", "aac", "wav", "ogg", "wma");
        }

        public function uploadSong($song){

            $ext = pathinfo($song['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $this->formatos)){
                $novo_nome = uniqid('', true).".$ext"; // cria um novo nome para o aleatório para o foto de perfil, isso serve para que não haja conflitos nos nomes das imagens na pasta profile_img.
                $song_file = "songs/".$novo_nome; // define a pasta de upload
                $temporario = $song['tmp_name']; //pasta temporária
    
                move_uploaded_file($temporario, "../$song_file");// move o arquivo do local temoporario para a pasta

                $songs = array($song_file);

                $album_control = new \classes\controler\AlbumControler($this->user_id);
                $title = $song['name'];
                $album_control->create_album($songs, $title);
                
                $this->insert_song($this->user_id, $song_file);
            }
            
        }
    }
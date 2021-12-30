<?php

    namespace classes\controler;

    use classes\model\Album;

    require_once '../vendor/autoload.php';

    class AlbumControler extends Album{

        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
        }

        public function create_album($songs, $title){
            $playlist_controler = new \classes\controler\PlaylistControler($this->user_id);
            $playlist_code_name = $playlist_controler->create_playlist($songs, $title);


            $this->insert_album($this->user_id, $playlist_code_name, $title);
                
        }
    }
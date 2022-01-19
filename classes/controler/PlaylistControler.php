<?php

    namespace classes\controler;

    use classes\model\PlaylistModel;

    require_once '../vendor/autoload.php';

    class PlaylistControler extends PlaylistModel{

        private $user_id;

        public function __construct($user_id, $code_name){
            $this->user_id = $user_id;
            $this->code_name = $code_name;
        }

        public function create_playlist($songs, $title, $visibility, $favorite){
            $this->insert_playlist($this->code_name, $title, $this->user_id, $visibility, $favorite);
            $this->add_song($this->code_name, $songs);
        }

        public function add_song($code_name, $songs){
            $this->add_songs($code_name, $songs);
        }
    }
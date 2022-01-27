<?php

    namespace classes\controler;

    use classes\model\PlaylistModel;

    require_once '../vendor/autoload.php';

    class PlaylistControler extends PlaylistModel{

        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
        }

        public function create_playlist($code_name, $songs, $title, $visibility, $favorite){
            $this->insert_playlist($code_name, $title, $this->user_id, $visibility, $favorite);
            $this->add_song($code_name, $songs);
        }

        public function add_song($code_name, $songs){
            $this->add_songs($code_name, $songs);
        }

        public function remove_song($code_name, $songs){
            $this->remove_songs($code_name, $songs);
        }
    }
<?php

    namespace classes\controler;

    use classes\model\Playlist;

    require_once '../vendor/autoload.php';

    class PlaylistControler extends Playlist{

        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
        }

        public function create_playlist($songs, $title){
            $code_name = uniqid('', true);
            $this->insert_playlist($code_name, $title, $this->user_id);
            $this->add_songs($code_name, $songs);
            return $code_name;
        }
    }
<?php

    namespace classes\controler;

    use classes\model\Cover;

    require_once '../vendor/autoload.php';

    class AlbumCover_ctrl extends Cover{

        private $user_id;
        private $album_id;

        public function __construct($user_id, $album_id ){
            $this->user_id = $user_id;
            $this->album_id = $album_id;
        }

        public function set_album_cover($cover_dir){
            $this->insert_cover($cover_dir, $this->album_id);
        }


    }
<?php

    namespace classes\controler;

    use classes\model\Album;

    
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class AlbumControler extends Album{

        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
        }

        public function create_album($songs, $title, $cover_dir, $about){

            $playlist_code_name = null;
            $single = true;

            if($songs !== "Solo"){
                $playlist_controler = new \classes\controler\PlaylistControler($this->user_id);
                $playlist_code_name = $playlist_controler->create_playlist($songs, $title);
                $single = false;
            }
            
            $album_id = $this->insert_album($this->user_id, $playlist_code_name, $title, $single, $about);  
            $cover_ctrl = new \classes\controler\AlbumCover_ctrl($this->user_id, $album_id);
            $cover_ctrl->set_album_cover($cover_dir);
            return $album_id;
        }

        public function get_all_user_albuns($user_id){
            $albuns = $this->get_all_albuns($user_id);
            return $albuns;
        }
    }
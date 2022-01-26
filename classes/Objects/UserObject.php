<?php

    namespace classes\objects;

    require_once 'vendor/autoload.php';

    class UserObject {

        private $username;
        private $id;
        private $art_name;

        private $bio;
        private $website;
        private $local;
        private $profile_img;

        private $albuns;
        private $songs;
 
        public function __construct($autor_info){

            $this->id = $autor_info['id'];
            $this->art_name = $autor_info['art_name'];
            $this->username = $autor_info['username'];

            $this->bio =  $autor_info['bio'];
            $this->website =  $autor_info['website'];
            $this->local =  $autor_info['localization'];
            $this->profile_img = $autor_info['profile_img_dir'];

            $this->set_albuns();
            $this->set_songs();
        }

        public function get_id(){
            return $this->id;
        }

        public function get_art_name(){
            return $this->art_name;
        }

        public function get_username(){
            return $this->username;
        }

        public function get_bio(){
            return $this->bio;
        }

        public function get_website(){
            return $this->website;
        }

        public function get_local(){
            return $this->local;
        }

        public function get_profile_img(){
            return $this->profile_img;
        }

        public function get_albuns(){
            return $this->albuns;
        }

        public function get_songs(){
            return $this->songs;
        }

        private function set_albuns(){
            $album_ctrl = new \classes\controler\AlbumControler($this->id);
            $this->albuns = $album_ctrl->get_all_user_albuns($this->id);
        }

        private function set_songs(){
            $song_ctrl = new \classes\controler\SongControler($this->id);
            $this->songs = $song_ctrl->get_all_user_songs($this->id);
        }
        
    }
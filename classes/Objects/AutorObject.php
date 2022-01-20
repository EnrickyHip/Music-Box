<?php

    namespace classes\objects;

    require_once 'vendor/autoload.php';

    class AutorObject {

        private $art_name;
        private $bio;
        private $website;
        private $local;
        private $profile_img;
 
        public function __construct($autor_info){

            $this->art_name = $autor_info['art_name'];
            $this->username = $autor_info['username'];
            $this->bio =  $autor_info['bio'];
            $this->website =  $autor_info['website'];
            $this->local =  $autor_info['localization'];
            $this->profile_img = $autor_info['profile_img_dir'];
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
        
    }
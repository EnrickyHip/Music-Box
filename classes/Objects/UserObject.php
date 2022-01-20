<?php

    namespace classes\objects;

    require_once 'vendor/autoload.php';

    class UserObject {

        private $username;
        private $art_name;
        private $id;
        private $profile_img;
 
        public function __construct($user_info){

        $this->username = $user_info['username'];
        $this->art_name = $user_info['art_name'];
        $this->id = $user_info['id'];
        $this->profile_img = "../".$user_info['profile_img_dir'];

        }

        public function get_username(){
            return $this->username;
        }

        public function get_art_name(){
            return $this->art_name;
        }

        public function get_id(){
            return $this->id;
        }

        public function get_profile_img(){
            return $this->profile_img;
        }
        
    }
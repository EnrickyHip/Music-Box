<?php

    namespace classes\controler;

    use classes\model\Signup;

    require_once '../vendor/autoload.php';

    class Signup_ctrl extends Signup{

        private $username;
        private $email;
        private $pwd;

        public function __construct($username, $email, $pwd){
           
            $this->username = $username;
            $this->email = $email;
            $this->pwd = $pwd;

        }

        public function create_user(){

        }

        public function check_user(){

            if ($this->taken_user()){
                echo true;
            }
            else {
                echo false;
            }

            if ($this->taken_email()){
                echo "email já existe";
            } 
        }

        private function taken_user(){
            return $this->check_username($this->username);
        }

        private function taken_email(){
            return $this->check_email($this->email);
        }


    }
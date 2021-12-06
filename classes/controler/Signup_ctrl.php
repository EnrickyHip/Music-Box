<?php

    namespace classes\controler;

    use classes\model\Signup;
    use classes\model\Login;

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
            $this->set_user($this->username, $this->email, $this->pwd);
            
            $login_ctrl = new \classes\controler\Login_ctrl($this->username, $this->email, $this->pwd);
            $user = Login::get_user_info($this->username);
            $login_ctrl->login_user($user);
        }

        public function check_exists_user(){
            if ($this->taken_user()){
                echo true;
            }
            else {
                echo false;
            }
        }

        public function check_exists_email(){
            if ($this->taken_email()){
                echo true;
            }
            else {
                echo false;
            }
        }
        

        private function taken_user(){
            return $this->check_username($this->username);
        }

        private function taken_email(){
            return $this->check_email($this->email);
        }


    }
<?php

    namespace classes\controler;

    use classes\model\Login;

class Login_ctrl extends Login {

        private $user;
        private $senha;

        public function __construct($user, $senha) { // precisa de um try catch ein

            $this->user = $user;
            $this->senha = $senha;
                
        }

        public function check_exists_user(){
            if(self::get_user_info($this->user)){
                echo true;
            }
            else {
                echo false;
            }
        }

        public function login_user($user){
            session_start();

            $_SESSION['usuario'] = array(
                                "id"=>$user[0]['id'],
                                "username"=>$user[0]['username'],
                                "art_name"=>$user[0]['art_name'],
                                "email"=>$user[0]['email']
                                );

            header('Location: ../?error=0');
            exit();

        }

        public function check_pwd(){
            $user = $this->get_user_info($this->user);

            $check_pwd = password_verify($this->senha, $user[0]['senha']);

            if ($check_pwd == true){
                echo true;              
            }
            else {
                echo false;
            }
        }
    }
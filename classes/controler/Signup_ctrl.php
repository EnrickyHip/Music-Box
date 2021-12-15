<?php

    // classe de controle de regidtro, aqui estão as funções principais para regidtrar o usuário no sistema, essa classe é o intermédio entre o banco de dados e a visualização do usuário.

    namespace classes\controler;  //isso é complexo, não sei explicar, mas serve para usar o autoload de classes

    use classes\model\Signup; //idem
    use classes\model\Login;

    require_once '../vendor/autoload.php';

    class Signup_ctrl extends Signup{ // classe. "extends" significa herança.

        //propriedades
        private $username;
        private $email;
        private $pwd;

        //construtor
        public function __construct($username, $email, $pwd){
            $this->username = $username;
            $this->email = $email;
            $this->pwd = $pwd;

        }

        //criar e logar usuário
        public function create_user(){
            $this->set_user($this->username, $this->email, $this->pwd); //insert do usuário no banco de dados

            //loga o usuário no sistema
            $login_ctrl = new \classes\controler\Login_ctrl($this->username, $this->email, $this->pwd);
            $login_ctrl->login_user($this->username);
            header('Location: ../?error=0');
        }

        //checa se o usuário já existe no sistema
        public function check_exists_user(){
            if ($this->taken_user()){
                echo true;
            }
            else {
                echo false;
            }
        }

        //checa se o email já existe no sistema
        public function check_exists_email(){
            if ($this->taken_email()){
                echo true;
            }
            else {
                echo false;
            }
        }
        

        //retorna se o usuário existe ou não
        private function taken_user(){
            return $this->check_username($this->username);
        }

        //retorna se o email existe ou não
        private function taken_email(){
            return $this->check_email($this->email);
        }


    }
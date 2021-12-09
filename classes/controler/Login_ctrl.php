<?php

 // classe de controle de login, aqui estão as funções principais para logar o usuário no sistema, essa classe é o intermédio entre o banco de dados e a visualização do usuário.

    namespace classes\controler; //isso é complexo, não sei explicar, mas serve para usar o autoload de classes

    use classes\model\Login; //idem

class Login_ctrl extends Login { // classe. "extends" significa herança.

        //propriedades
        private $user; 
        private $senha;

        //construtor
        public function __construct($user, $senha) {

            //variáveis $this-> referem-se as propriedades
            $this->user = $user;
            $this->senha = $senha;
                
        }

        //checa se o usuário já existe
        public function check_exists_user(){
            if(self::get_user_info($this->user)){
                echo true;
            }
            else {
                echo false;
            }
        }

            //loga o usuário no sistem
        public function login_user($user){
            session_start();

           //armazena as informações do usuário em um array associativo
            $_SESSION['usuario'] = array(
                                "id"=>$user[0]['id'],
                                "username"=>$user[0]['username'],
                                "art_name"=>$user[0]['art_name'],
                                "email"=>$user[0]['email']
                                );

            header('Location: ../?error=0');
            exit();

        }

        //checa se as senhas coincidem
        public function check_pwd(){
            $user = self::get_user_info($this->user);

            $check_pwd = password_verify($this->senha, $user[0]['senha']); //verfica se a senha que o usuário digitou coincide com o hash

            if ($check_pwd == true){
                echo true;              
            }
            else {
                echo false;
            }
        }
    }
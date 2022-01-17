<?php

 // classe de controle de login, aqui estão as funções principais para logar o usuário no sistema, essa classe é o intermédio entre o banco de dados e a visualização do usuário.

    namespace classes\controler; //isso é complexo, não sei explicar, mas serve para usar o autoload de classes

    use classes\model\UserModel; //idem

class LoginControler extends UserModel { // classe. "extends" significa herança.

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
            if(self::get_user_info($this->user, "username")){
                echo true;
            }
            else {
                echo false;
            }
        }

            //loga o usuário no sistem
        public function login_user($user){//recebe o username OU email
            session_start();
            $user = self::get_user_info($user, '*');

           //armazena as informações do usuário em um array associativo
            $_SESSION['usuario'] = array(
                                "id"=>$user[0]['id'],
                                "username"=>$user[0]['username'],
                                "art_name"=>$user[0]['art_name'],
                                "email"=>$user[0]['email'],
                                "bio"=>$user[0]['bio'],
                                "website"=>$user[0]['website'],
                                "localization"=>$user[0]['localization'],
                                "profile_img_dir"=>$user[0]['profile_img_dir']
                                );
        }

        //checa se as senhas coincidem
        public function check_pwd(){
            $user = self::get_user_info($this->user, 'senha');

            $check_pwd = password_verify($this->senha, $user[0]['senha']); //verfica se a senha que o usuário digitou coincide com o hash

            if ($check_pwd == true){
                echo true;              
            }
            else {
                echo false;
            }
        }
    }
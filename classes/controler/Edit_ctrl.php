<?php

    // classe de controle de regidtro, aqui estão as funções principais para regidtrar o usuário no sistema, essa classe é o intermédio entre o banco de dados e a visualização do usuário.

    namespace classes\controler;  //isso é complexo, não sei explicar, mas serve para usar o autoload de classes

    use classes\model\Edit;

    require_once '../vendor/autoload.php';

    class Edit_ctrl extends Edit{ // classe. "extends" significa herança.

        //propriedades
        private $user_id;
        private $art_name;
        private $username;
        private $bio;
        private $website;
        private $local;

        //construtor
        public function __construct($user_id, $art_name, $username, $bio, $website, $local){
            $this->user_id = $user_id;
            $this->art_name = $art_name;
            $this->username = $username;
            $this->bio = $bio;
            $this->website = $website;
            $this->local = $local;

        }

        public function edit_user(){
            $this->set_null();
            $this->update_user($this->user_id, $this->art_name, $this->username, $this->bio, $this->website, $this->local);

            $login_ctrl = new \classes\controler\Login_ctrl($this->username, null, null);
            $login_ctrl->login_user($this->username);
            header("Location: ../../?p=autor&a=$this->username");
        }

        private function set_null(){

            if($this->bio === ""){
                $this->bio = null;
            }

            if($this->website === ""){
                $this->website = null;
            }

            if($this->local === ""){
                $this->local = null;
            }
        }
    }
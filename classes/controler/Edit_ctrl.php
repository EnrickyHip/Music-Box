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
        private $foto;

        //construtor
        public function __construct($user_id, $art_name, $username, $bio, $website, $local, $foto){
            $this->user_id = $user_id;
            $this->art_name = $art_name;
            $this->username = $username;
            $this->bio = $bio;
            $this->website = $website;
            $this->local = $local;
            $this->foto = $foto;

        }

        public function edit_user(){
            $profile_img_dir = $this->set_profile_img();
            $this->set_null();
            $this->update_user($this->user_id, $this->art_name, $this->username, $this->bio, $this->website, $this->local, $profile_img_dir);

            $login_ctrl = new \classes\controler\Login_ctrl($this->username, null, null);
            $login_ctrl->login_user($this->username);
            header("Location: ../../?p=autor&a=$this->username");
        }

        private function set_profile_img(){
            $formatos = array("png", "jpg", "jpeg", "PNG");

            $ext = pathinfo($this->foto['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $formatos)){ // testa se a extensão do arquivo é compatível

                if ($this->foto['error'] === 0){ //caso não haja erros na foto
    
                    $novo_nome = uniqid('', true).".$ext"; // cria um novo nome para o aleatório para o foto de perfil, isso serve para que não haja conflitos nos nomes das imagens na pasta profile_img.
                    $pasta_files = "profile_img/".$novo_nome; // define a pasta de upload
                    $temporario = $this->foto['tmp_name']; //pasta temporária
    
                    move_uploaded_file($temporario, "../$pasta_files");// move o arquivo do local temoporario para a pasta

                    $old_profile_img = "../".$_SESSION['usuario']['profile_img_dir'];

                    if($old_profile_img !== "../profile_img/Avatar_PlaceHolder.png"){
                        unlink($old_profile_img);
                    }
                    return $pasta_files;
                }
                else {
                    header("Location: ../?error=uploaderror");
                    exit();
                }
            }
            else {
                header("Location: ../?error=extensionNotAlwd");
                exit();
            }
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
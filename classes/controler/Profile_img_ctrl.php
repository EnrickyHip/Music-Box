<?php

    //classe de controle de foto de perfil, aqui estão as funções principais para alterar e definir fotos de perfil. é o intermédio entre o banco de dados e a visualização do usuário

    namespace classes\controler;//isso é complexo, não sei explicar, mas serve para usar o autoload de classes


    use classes\model\Profile_img;//idem

    class Profile_img_ctrl extends Profile_img { // classe. "extends" significa herança.
        
        // propriedades
        private $formatos;
        private $user_id;

        // construtor
        public function __construct($user_id){

            //variáveis $this-> referem-se as propriedades
            $this->formatos = array("png", "jpg", "jpeg");
            $this->user_id = $user_id;
        }
        
        // método que define a a foto de perfil para o usuário
        public function set_profile_img($foto, $username){

            $ext = pathinfo($foto['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $this->formatos)){ // testa se a extensão do arquivo é compatível

                if ($foto['error'] === 0){ //caso não haja erros na foto

                    $check_profile_img = $this->check_profile_img($this->user_id); //retorna a foto de perfil do usuário
                    if ($check_profile_img){
                        $this->remove_profile_img(); //caso haja, remove a foto de perfil
                    }
    
                    $novo_nome = uniqid('', true).".$ext"; // cria um novo nome para o aleatório para o foto de perfil, isso serve para que não haja conflitos nos nomes das imagens na pasta profile_img.
                    $pasta_files = "profile_img/".$novo_nome; // define a pasta de upload
                    $temporario = $foto['tmp_name']; //pasta temporária
    
                    move_uploaded_file($temporario, "../$pasta_files");// move o arquivo do local temoporario para a pasta

                    $this->insert_profile_img($pasta_files, $this->user_id, $username); // insert da foto no banco de dados
                    exit();
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

        //remove a foto de perfil
        public function remove_profile_img(){

            $this->delete_profile_img_file($this->user_id); //deleta o arquivo
            $this->delete_profile_img($this->user_id); //deleta o registro no banco
            
        }


        // retorna a foto de perfil do usuário
        public function get_profile_img($user){

            $user = $this->check_profile_img($user['id']);

            if ($user){
                $profile_img = $user[0]['img_dir'];
            }
            else {
                $profile_img = "profile_img/Avatar_PlaceHolder.png"; // caso o usuário não possua foto de perfil, sua foto será o Avatar_PlaceHolder.png como padrão
            }

            return $profile_img;  
        }

        //deleta o arquivo da foto
        private function delete_profile_img_file(){

            $file = $this->check_profile_img($this->user_id); //retorna a foto de perfil do banco
            $file = "../".$file[0]['img_dir']; //define a variável como o caminho da foto
            unlink($file); //deleta o arquivo
        }
    }





        
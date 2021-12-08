<?php

    namespace classes\controler;

    use classes\model\Profile_img;

    class Profile_img_ctrl extends Profile_img {
        
        private $formatos;
        private $user_id;

        public function __construct($user_id){

            $this->formatos = array("png", "jpg", "jpeg");
            $this->user_id = $user_id;
        }
        

        public function set_profile_img($foto, $username){

            $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);

            if(in_array($ext, $this->formatos)){ // testa se a extensão do arquivo é compatível

                if ($foto['error'] === 0){

                    $check_profile_img = $this->check_profile_img($this->user_id);

                    if ($check_profile_img){
                        $this->remove_profile_img();
                    }
    
                    $novo_nome = uniqid('', true).".$ext";
                    $pasta_files = "../uploads/".$novo_nome; // define a pasta 
                    $temporario = $foto['tmp_name'];
    
                    move_uploaded_file($temporario, $pasta_files);// move o arquivo do local temoporario para a pasta

                    $pasta_files = "uploads/".$novo_nome;

                    $this->insert_profile_img($pasta_files, $this->user_id, $username);

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


        public function remove_profile_img(){

            $this->delete_profile_img_file($this->user_id);
            $this->delete_profile_img($this->user_id);
            
        }


        public function get_profile_img($user){

            $user = $this->check_profile_img($user['id']);

            if ($user){
                $profile_img = $user[0]['img_dir'];
            }
            else {
                $profile_img = "images/Avatar_PlaceHolder.png";
            }

            return $profile_img;  
        }


        private function delete_profile_img_file(){

            $file = $this->check_profile_img($this->user_id); 
            $file = "../".$file[0]['img_dir']; 
            unlink($file);
        }
    }





        
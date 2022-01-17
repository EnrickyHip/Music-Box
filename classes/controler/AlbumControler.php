<?php

    //controle de álbum.

    namespace classes\controler;

    use classes\model\AlbumModel;
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class AlbumControler extends AlbumModel{

        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
        }

        public function create_album($songs, $title, $cover, $about){ //função para criar album

            $playlist_code_name = null;
            $single = true; 

            if($songs !== "Solo"){ //instancia e cria a playlist caso o álbum não seja solo.
                $playlist_controler = new \classes\controler\PlaylistControler($this->user_id);
                $playlist_code_name = $playlist_controler->create_playlist($songs, $title);
                $single = false;

                if ($cover['size'] == 0){ //caso o usuário não defina nenhuma capa para o álbum, será definida como a default
                    $cover_dir = "album_covers/default-cover-art.png";
                }
                else{
                    $cover_dir = $this->set_album_cover($cover);
                }
            }
            else {
                $cover_dir = $cover;
            }
            
            $album_id = $this->insert_album($this->user_id, $playlist_code_name, $title, $single, $about, $cover_dir);  
            return $album_id;
        }

        private function set_album_cover($cover){ //função para definir capa do álbum, retornando a pasta do arquivo
            $formatos = array("png", "jpg", "jpeg", "PNG");

            $ext = pathinfo($cover['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $formatos)){ // testa se a extensão do arquivo é compatível

                if ($cover['error'] === 0){ //caso não haja erros na foto
    
                    $novo_nome = uniqid('', true).".$ext"; // cria um novo nome para o aleatório para o arquivo, isso serve para que não haja conflitos nos nomes
                    $pasta_files = "album_covers/".$novo_nome; // define a pasta de upload
                    $temporario = $cover['tmp_name']; //pasta temporária
    
                    move_uploaded_file($temporario, "../$pasta_files");// move o arquivo do local temoporario para a pasta

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

        public function get_all_user_albuns($user_id){
            $albuns = $this->get_all_albuns($user_id);
            return $albuns;
        }
    }
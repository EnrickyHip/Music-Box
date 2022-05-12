<?php

    namespace classes\controler;

    use classes\model\AlbumModel;
    use \classes\model\SongModel;

    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class SongControler extends SongModel{

        private $user_id;
        private $formatos;
        
        public function __construct($user_id){

            $this->user_id = $user_id;
            $this->formatos = array("mp3", "aac", "wav", "ogg", "wma");
        }

        public function uploadSong($song, $album_id, $visibility, $song_title, $song_desc, $genre, $subgenre, $song_code_name){

            $ext = pathinfo($song['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo

            if(in_array($ext, $this->formatos)){

                if ($song['error']) return;
                    
                $song_file_name = $_SESSION[$song_code_name]['file_name']; //$_SESSION['actual_song']['file_name'] refere-se ao nome do arquivo, $_SESSION['actual_song'] é um array com as informações da música, foi criado em song_register.
                $song_file = "songs/".$song_file_name; // define a pasta de upload
                $temporario = "../temp_songs/".$song_file_name; //pasta temporária
                rename($temporario, "../$song_file");// move o arquivo do local temoporario para a pastas
                $_SESSION[$song_code_name] = null;

                if(!$album_id){ //caso o usuário não tenha selecionado álbum, o sistema irá criar um solo para a música
                    $album_id = $this->createSoloAlbum($song_title);
                    $single = true;
                }
                else {
                    $single = false;
                }

                $this->insert_song($song_code_name, $song_title,  $song_file, $visibility, $single, $this->user_id, $album_id, $song_desc, $genre, $subgenre);

                if(!$single){
                    $playlist_code_name = AlbumModel::get_album_info($album_id, "playlist_code_name")['playlist_code_name'];

                    $playlist_controler = new \classes\controler\PlaylistControler($this->user_id);
                    $playlist_controler->add_song($playlist_code_name, [$song_code_name]);
                }

                return $song_code_name;  
            }
        }

        public function edit_song($song_title, $new_album_id, $about, $visibility, $genre, $subgenre, $key, $type, $song_codename, $cover){

            $song_old_info = SongModel::get_song_info($song_codename, '*');
            $old_song_album = $song_old_info['album_id'];
            $playlist_ctrl = new \classes\controler\PlaylistControler($this->user_id);
            $album_ctrl = new \classes\controler\AlbumControler($this->user_id);
            $single = true;
            
            if($new_album_id !== $old_song_album){
                if($new_album_id !== "solo"){

                    $this->change_album($song_codename, false, $new_album_id);
                    $single = false;

                    $new_album_playlist_code_name = AlbumModel::get_album_info($new_album_id, 'playlist_code_name')['playlist_code_name'];

                    
                    if($song_old_info['single']){
                        $album_ctrl->delete_album($old_song_album);
                        $playlist_ctrl->add_song($new_album_playlist_code_name, [$song_codename]);
                    }
                    else {

                        $old_album_playlist_code_name = AlbumModel::get_album_info($old_song_album, 'playlist_code_name')['playlist_code_name'];

                        $playlist_ctrl->add_song($new_album_playlist_code_name, [$song_codename]);
                        $playlist_ctrl->remove_song($old_album_playlist_code_name, [$song_codename]);
                    }
                }

                else if(!$song_old_info['single']){

                        $new_album_id = $this->createSoloAlbum($song_title);

                        if ($cover['size'] === 0){
                            $cover_dir = "album_covers/default-cover-art.png";
                        }
                        else{
                            $cover_dir =  $album_ctrl->set_album_cover($cover);
                        }

                        $album_ctrl->edit_album($song_title, true, '', $cover_dir, $new_album_id);
                        $this->change_album($song_codename, true, $new_album_id);

                        $old_album_playlist_code_name = AlbumModel::get_album_info($old_song_album, 'playlist_code_name')['playlist_code_name'];

                        $playlist_ctrl->remove_song($old_album_playlist_code_name, [$song_codename]);
                }
            }
            $this->update_song($song_title, $single, $visibility, $about, $genre, $subgenre, $key, $type, $song_codename);
        }

        private function createSoloAlbum($song_title){ //cria o album solo
            $songs = "Solo";
            $album_control = new \classes\controler\AlbumControler($this->user_id);
            $title = $song_title;
            $cover_dir = "album_covers/default-cover-art.png";
            $about = "";
            $album_id = $album_control->create_album($songs, $title, $cover_dir, $about);
            return $album_id;
        }

        private function edit_album(){

        }

        public function get_all_solo_songs(){
            $songs = $this->get_solo_songs($this->user_id);
            return $songs;
        }

        public function get_all_user_songs(){
            $songs = $this->get_all_songs($this->user_id);
            return $songs;
        }

        public function change_album($song, $single, $album_id){         
            $this->update_album($song, $single, $album_id);
        }
    }
<?php

    namespace classes\objects;

    use classes\model\AlbumModel;
    use classes\model\SongModel;
    use classes\model\UserModel;

    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class SongObject extends SongModel{

        private $code_name;

        private $title;
        private $autor_id;
        private $file;
        private $album_id;

        private $album_title;
        private $album_cover;

        private $autor_name;
        private $autor_username;
        private $autor_profile_img;
 
        public function __construct($song){

            $this->code_name = $song['code_name'];

            $this->title = $song['title'];
            $this->autor_id = $song['autor_id'];
            $this->file = $song['file_dir'];
            $this->album_id = $song['album_id'];
            
            $this->set_album_info();
            $this->set_user_info();
        }
        
        private function set_album_info(){
            $album = AlbumModel::get_album_info($this->album_id, 'title, cover_dir, single');
                        
            $album_single = $album['single'];

            $this->album_cover = $album['cover_dir'];

            if ($album_single) {
                $this->album_title = "Solo";
            }
            else{
                $this->album_title = $album['title'];
            }
        }

        private function set_user_info(){
            $autor = UserModel::get_user_info($this->autor_id, 'art_name, username, profile_img_dir');

            $this->autor_name = $autor['art_name'];
            $this->autor_username = $autor['username'];
            $this->autor_profile_img = "../" . $autor['profile_img_dir'];
        }

        public function encode(){
            $song_info = [
                'title' => $this->title,
                'artist' => $this->autor_name,
                'src' => $this->file,
                'cover' => $this->album_cover,
                'code_name' => $this->code_name
            ];
    
            $song_json = json_encode($song_info);
            return $song_json;
        }

        public function get_title(){
            return $this->title;
        }

        public function get_album_title(){
            return $this->album_title;
        }

        public function get_album_cover(){
            return $this->album_cover;
        }

        public function get_autor_username(){
            return $this->autor_username;
        }

        public function get_autor_name(){
            return $this->autor_name;
        }

        public function get_autor_profile_img(){
            return $this->autor_profile_img;
        }
    }
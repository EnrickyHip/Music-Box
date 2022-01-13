<?php

     //classe model de registro, o model serve para interações como o banco de dados, ela é exclusiva para isto, e apenas ela pode fazer isto.
    namespace classes\model;

    class User extends Database { // classe. "extends" significa herança.

        public static function get_user_info($user){

            $stmt = self::connect()->prepare('SELECT * FROM usuario WHERE username = ? OR email = ?;');//conecta com o banco de dados e prepara a execução

            if (!$stmt->execute(array($user, $user))) { // executa e testa se há erros

                $stmt = null;
                header("Location: ../login_page.php?error=stmtError");
                exit();
            }  

            if ($stmt->rowCount() > 0){

                /*retorna as informações 
                em forma de array associativo
                as informações podem ser acessadas assim, por ex:

                $array = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
                $atributo = $array[0]['nome_do_atributo'];

                0 refere-se a seleção 0, ou seja, a primera. <- não tenho certeza disto. 
                */
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            }
            else {
                return false;
            }
        }
        
        //checa se o usuario existe a partir do username
        protected function check_username($username){

            $stmt = $this->connect()->prepare('SELECT username FROM usuario WHERE username = ?;');

            if (!$stmt->execute(array($username))) {

                $stmt = null;
                header("Location: ../../register.php?error=stmtError"); //apenas para testes
                exit();
            }  

            $result = null;

            if($stmt->rowCount() > 0) {
                $result = true;
            }
            else {
                $result = false;
            }

            return $result;
        }

        //checa se o usuario existe a partir do email
        protected function check_email($email){

            $stmt = $this->connect()->prepare('SELECT email FROM usuario WHERE email = ?;');

            if (!$stmt->execute(array($email))) {

                $stmt = null;
                header("Location: ../../register.php?error=stmtError"); //apenas para testes
                exit();
            }  

            $result = null;

            if($stmt->rowCount() > 0) {
                $result = true;
            }
            else {
                $result = false;
            }

            return $result;
        }

        //da um insert do usuário no banco de dados.
        protected function set_user($username, $email ,$pwd){
            $stmt = $this->connect()->prepare("INSERT INTO usuario (username, art_name, email, senha, profile_img_dir) VALUES(?, ?, ?, ?, ?);");

            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT); //criptografa a senha
            $profile_img_dir = "profile_img/Avatar_PlaceHolder.png";

            if (!$stmt->execute(array($username, $username, $email, $hashed_pwd, $profile_img_dir))) {

                $stmt = null;
                header("Location: ../../index.php?error=stmtError");
                exit();
            }  
        }
        
    }
<?php

    namespace classes\model;

    class Signup extends Database {
        
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

        protected function set_user($username, $email ,$pwd){
            $stmt = $this->connect()->prepare("INSERT INTO usuario (username, art_name, email, senha) VALUES(?, ?, ?, ?);");

            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

            if (!$stmt->execute(array($username, $username, $email, $hashed_pwd))) {

                $stmt = null;
                header("Location: ../../index.php?error=stmtError");
                exit();
            }  
        }
        
    }
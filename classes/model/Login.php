<?php

    namespace classes\model;

    class Login extends Database {

        public function get_user_info($user){

            $stmt = self::connect()->prepare('SELECT * FROM usuario WHERE username = ? OR email = ?;');

            if (!$stmt->execute(array($user, $user))) {

                $stmt = null;
                header("Location: ../login_page.php?error=stmtError");
                exit();
            }  

            if ($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
            else {
                return false;
            }
        }
    }
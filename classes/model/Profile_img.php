<?php

 //classe model da foto de perfil, o model serve para interações como o banco de dados, ela é exclusiva para isto, e apenas ela pode fazer isto.

    namespace classes\model;

    class Profile_img extends Database { // classe. "extends" significa herança.

        //esta função inseri o >>caminho<< até a foto de perfil no banco de dados, juntamente com o id do usuário a qual ela pertence
        protected function insert_profile_img($pasta_files, $user_id, $username) { 

            $stmt = self::connect()->prepare("INSERT INTO profile_img (img_dir, id_user) VALUES (?,?)");

            if (!$stmt->execute(array($pasta_files, $user_id))) { 

                $stmt = null;
                header("Location: ../?error=stmtError");
                exit();
            }
            else {
                header("Location: ../?p=autor&a=".$username."&e=true");
                exit();
            }
        }

        //esta função pode ser servir para várias coisas, em geral ela retorna as informações da foto de perfil do usuário por meio de um array assiciativo, caso o usuário não possua foto de perfil, a função retorna falsa.
        protected function check_profile_img($user_id){

            $stmt = self::connect()->prepare("SELECT img_dir FROM profile_img WHERE id_user = ?");

            if (!$stmt->execute(array($user_id))) {

                $stmt = null;
                header("Location: ../?error=stmtError");
                exit();
            }

            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
            else {
                $result = false;
            }

            return $result;

        }

        //deleta a foto de perfil do banco de dados
        protected function delete_profile_img($user_id){

            $stmt = self::connect()->prepare("DELETE FROM profile_img WHERE id_user = ?");

            if (!$stmt->execute(array($user_id))) {

                $stmt = null;
                header("Location: ../?error=stmtError");
                exit();
            }
        }
    }
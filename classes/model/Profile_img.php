<?php

    namespace classes\model;

    class Profile_img extends Database {

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

        protected function delete_profile_img($user_id){

            $stmt = self::connect()->prepare("DELETE FROM profile_img WHERE id_user = ?");

            if (!$stmt->execute(array($user_id))) {

                $stmt = null;
                header("Location: ../?error=stmtError");
                exit();
            }
        }
    }
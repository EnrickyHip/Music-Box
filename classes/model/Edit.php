<?php

     //classe model de edição de usuário, o model serve para interações como o banco de dados, ela é exclusiva para isto, e apenas ela pode fazer isto.
    namespace classes\model;

    class Edit extends Database { // classe. "extends" significa herança.

        function update_user($user_id, $art_name, $username, $bio, $website, $local){

            $stmt = $this->connect()->prepare('UPDATE usuario SET art_name = ?, username = ?, bio = ?, website = ?, localization = ? WHERE id = ?;');

            if (!$stmt->execute(array($art_name, $username, $bio, $website, $local, $user_id))) {

                $stmt = null;
                header("Location: ../../register.php?error=stmtError"); //apenas para testes
                exit();
            }  
        }
    }
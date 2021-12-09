<?php

     //classe model de login, o model serve para interações como o banco de dados, ela é exclusiva para isto, e apenas ela pode fazer isto.

    namespace classes\model;

    class Login extends Database { // classe. "extends" significa herança.

        //retorna as informações do usuário
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
    }
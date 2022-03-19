<?php

    //classe model de conexão com do banco de dados, o model serve para interações como o banco de dados, ela é exclusiva para isto, e apenas ela pode fazer isto.

    namespace classes\model;

    class Database { // classe. "extends" significa herança.

            //propriedades e métodos estáticos são iguais para todos os objetos, para elas usanmos self:: ao invés do $this
            private static $db;

            protected static function connect() { // essa classe serve para conectar ao banco de dados

                if (!isset(self::$db)){
                    try {
                        $username = "root";
                        $password = "";
                        $dbname = "music_box";
                        self::$db = new \PDO('mysql:host=localhost; dbname='.$dbname, $username, $password);
            
                    } catch (\PDOException $e) {
                        print "Error: ". $e->getMessage() . "<br/>";
                        die();
                    }
                } 
                
                return self::$db;
            }
        }
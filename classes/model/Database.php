<?php

    namespace classes;

    class database {

            private static $db;

            protected static function connect() { // essa classe serve para conectar ao banco de dados

                if (!isset(self::$db)){
                    try {
                        $username = "root";
                        $password = "";
                        $dbname = "music-box";
                        self::$db = new \PDO('mysql:host=localhost; dbname=', $dbname, $username, $password);
            
                    } catch (\PDOException $e) {
                        print "Error: ". $e->getMessage() . "<br/>";
                        die();
                    }
                } 
                return self::$db;
            }
        }
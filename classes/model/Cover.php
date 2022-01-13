<?php

    namespace classes\model;

    require_once '../vendor/autoload.php';

    class Cover extends Database{

        protected function insert_cover($cover_dir, $album_id){

            $stmt = $this->connect()->prepare("INSERT INTO cover (img_dir, album_id) VALUES(?,?);");

            if (!$stmt->execute(array($cover_dir, $album_id))) { // executa e testa se há erros
                header("Location: ../?error=instertCovererror");
                exit();
            }
        }
    }
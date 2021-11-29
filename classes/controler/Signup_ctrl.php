<?php

    namespace classes\controler;

    require_once '../vendor/autoload.php';

    class Signup_ctrl{

        private $name;
        private $email;
        private $pwd;
        private $c_pwd;

        public function __construct($name, $email, $pwd, $c_pwd){
           
            $this->name = $name;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->c_pwd = $c_pwd;

        }
    }
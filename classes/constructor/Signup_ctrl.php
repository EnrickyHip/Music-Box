<?php

    require_once '../vendor/autoload.php';

    class signup_contrl{

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
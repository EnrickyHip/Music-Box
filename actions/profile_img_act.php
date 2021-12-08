<?php

    require_once '../vendor/autoload.php';
    
    session_start();

    if (isset($_SESSION['usuario'])){
        if (isset($_POST['send_profile_img'])){

            $self_username = $_SESSION['usuario']['username'];
            $self_id = $_SESSION['usuario']['id'];
            $foto = $_FILES['inputFile'];
    
            $profile_img = new \classes\controler\Profile_img_ctrl($self_id);
            $profile_img->set_profile_img($foto, $self_username);
        }
        else {
            header('Location: ../');
            exit();
        }
    }
    else {
        header('Location: logout.php');
        exit();
    }

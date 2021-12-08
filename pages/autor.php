<?php

    use classes\model\Login;

    require_once 'vendor/autoload.php';

    $autor = filter_input(INPUT_GET, 'a');
    $edit = filter_input(INPUT_GET, 'e');

    $user_autor = Login::get_user_info($autor);
    $profile_ctrl = new \classes\controler\Profile_img_ctrl($user_autor[0]['id']);
    $autor_profile_img = $profile_ctrl->get_profile_img($user_autor[0]);

    if (!$user_autor){
        require "includes/autor_error.php";
    }
    else {

        $username_autor = $user_autor[0]['username'];

        if ($self_username == $username_autor and $edit === "true"){
            require "includes/autor_edit.php";
        }
        else {
            require "includes/autor_inc.php";
        }   
    }
    
?>
<?php

    //pagina de autor

    use classes\model\Login;

    require_once 'vendor/autoload.php';

    //recebe as variáveis GET
    $username_autor = filter_input(INPUT_GET, 'a');
    $edit = filter_input(INPUT_GET, 'e');


    $user_autor = Login::get_user_info($username_autor); //recebe as informações do autor da página
    $art_user_autor =  $user_autor[0]['art_name'];

    if (!$user_autor){
        require "includes/autor_error.php"; //caso o autor não exista, irá para uma página de erro
    }
    else {

        $profile_ctrl = new \classes\controler\Profile_img_ctrl($user_autor[0]['id']); //instancia o controle de foto de perfil
        $autor_profile_img = $profile_ctrl->get_profile_img($user_autor[0]); //recebe a foto de perfil do autor

        //se o autor for o mesmo do usuário logado e a variável edit estiver habilitada, o usuário irá para a página de edição, caso não, será redirecionado para o página de autor
        if (isset($self_user)){
            if ($self_username == $username_autor and $edit === "true"){ 
                require "includes/autor_edit.php"; 
            }
            else {
                require "includes/autor_inc.php";
            } 
        }
        else{
            require "includes/autor_inc.php";
        }
    }
?>
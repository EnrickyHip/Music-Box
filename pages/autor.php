<?php

    //pagina de autor

    use classes\model\UserModel;

    require_once 'vendor/autoload.php';

    //recebe as variáveis GET
    $username_autor = filter_input(INPUT_GET, 'a');
    $edit = filter_input(INPUT_GET, 'e');

    $user_autor = UserModel::get_user_info($username_autor); //recebe as informações do autor da página

    if (!$user_autor){
        require "includes/autor_error.php"; //caso o autor não exista, irá para uma página de erro
    }
    else {

        $art_user_autor =  $user_autor[0]['art_name'];
        $art_bio =  $user_autor[0]['bio'];
        $art_website =  $user_autor[0]['website'];
        $art_local =  $user_autor[0]['localization'];
        $art_user_autor = filter_var($art_user_autor, FILTER_SANITIZE_STRING);

        $autor_profile_img = $user_autor[0]['profile_img_dir'];

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
    
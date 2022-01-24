<?php

    //pagina de autor

    use classes\model\UserModel;

    require_once 'vendor/autoload.php';

    //recebe as variáveis GET
    $username_autor = filter_input(INPUT_GET, 'a');
    $edit = filter_input(INPUT_GET, 'e');

    $user_autor = UserModel::get_user_info($username_autor, '*'); //recebe as informações do autor da página

    if (!$user_autor){
        require "includes/autor_error.php"; //caso o autor não exista, irá para uma página de erro
    }
    else {

        $autor = new \classes\objects\AutorObject($user_autor);
        $album_ctrl = new \classes\controler\AlbumControler($self_user->get_id());
        $albuns = $album_ctrl->get_all_user_albuns($self_user->get_id());
        //se o autor for o mesmo do usuário logado e a variável edit estiver habilitada, o usuário irá para a página de edição, caso não, será redirecionado para o página de autor
        if (isset($self_user)){
            if ($self_user->get_username() == $autor->get_username() and $edit === "true"){
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
    
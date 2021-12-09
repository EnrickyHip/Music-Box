<?php

    // esse arquivo recebe a requisição do ajax para testar se o email já existe para que o usuário possa se registrar

    include_once "../vendor/autoload.php";

    if (isset($_POST['email_'])){ //testa se a requisição foi feita

        $email = filter_input(INPUT_POST, "email_", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //instancia o controle e checa se o email já existe
        $signup_ctrl = new \classes\controler\Signup_ctrl('', $email, ''); 
        $signup_ctrl->check_exists_email();
    }

    else{
        header("Location: ../?t=logoOnly&p=register");  // retorna o usuário para a página de registro caso a requisição não seja feita
        exit();
    }
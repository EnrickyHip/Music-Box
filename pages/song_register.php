<?php

    require_once 'vendor/autoload.php';

    session_start();

    if (!isset($_SESSION['usuario'])){ // testa se o usuário está logado
        header('Location: actions/logout.php'); // encerra a sessão caso o usuário não esteja logado
        exit();
    }

    if (!isset($_FILES['upload_song_input'])){ // testa se o formulário com a foto de perfil foi enviado
        header('Location: /'); //se o formulario não for enviado o usuário retorna ao menu
        exit();
    }

    $song = $_FILES['upload_song_input'];  //esta sessão é usado para armazenar o arquivo da música à ser cadastrado durante o processo de preenchimento de seu formulário, isto porque o php salva as informações de um formulário post apenas no arquivo definido no action.

    $code_name = uniqid('', true);

    $ext = pathinfo($song['name'], PATHINFO_EXTENSION); //recebe a extensão do arquivo
    $novo_nome = $code_name.".$ext";

    $_SESSION[$code_name]['file_info'] = $song;
    $_SESSION[$code_name]['file_name'] = $novo_nome;

    $pasta_files = "temp_songs/".$novo_nome; // define a pasta de upload

    $temporario = $song['tmp_name']; //pasta temporária
    move_uploaded_file($temporario, "$pasta_files");// move o arquivo do local temoporario para a pasta
    $_SESSION[$code_name]['file_path'] = "../$pasta_files";

    $self_id = $_SESSION['usuario']['id'];

    require_once "includes/song_register_inc.php";


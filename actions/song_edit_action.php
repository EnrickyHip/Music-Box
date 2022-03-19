<?php

   // este arquivo recebe o formulário de edição de perfil
   session_start();

    include_once "../vendor/autoload.php";

    if (!isset($_POST['edit_song_codename'])){ // testa se o formuçário foi enviado
        header("Location: ../?p=autor&a=".$self_username."&e=true&error=true"); //retorna para a página de registro caso o usuário não tenha enviado o formulário
        exit();
    }

    //recebe as variáveis
    $user_id = $_SESSION['usuario']['id'];
    $song_codename = $_POST['edit_song_codename'];

    $song_title = filter_input(INPUT_POST, "song_title_edit", FILTER_SANITIZE_SPECIAL_CHARS);
    $visibility = $_POST['visibility_edit'];
    $about = filter_input(INPUT_POST, "song_desc_edit", FILTER_SANITIZE_SPECIAL_CHARS);
    $genre = $_POST['genre_edit'];
    $album_id = $_POST['album_edit_select'];

    $cover = $_FILES['inputCover_edit'];

    if($about === ''){
        $about = null;
    }
        
    if(isset($_POST['subgenre_edit'])){
        $subgenre = $_POST['subgenre_edit'];
    }
    else{
        $subgenre = null;
    }

    $visibility = ($visibility === "true");

    if($album_id !== "solo"){
        $album_id = (int)$_POST['album_edit_select'];
    }

    if($_POST['key_select'] === "null"){
        $key = null;
    }
    else {
        $key = $_POST['key_select'];
    }

    if(!isset($_POST['song_type'])){
        $type = null;
    }
    else if($_POST['song_type'] === 'Não definido'){
        $type = null;
    }
    else {
        $type = $_POST['song_type'];
    }

    //instancia o controle e edita as informações do usuário
    $song_ctrl = new \classes\controler\SongControler($user_id); 
    $song_ctrl->edit_song($song_title, $album_id, $about, $visibility, $genre, $subgenre, $key, $type, $song_codename, $cover);
    header("Location: ../?p=song&s=$song_codename&error=musica_editada_com_sucesso");
   
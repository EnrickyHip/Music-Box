<!-- template da página principal -->

<!DOCTYPE html>
<html lang="pt-br">
<?php

    require_once 'vendor/autoload.php';

    session_start();

    //caso o usuario esteja logado, essas variaveis irao receber as informações do usuário
    if(isset($_SESSION['usuario'])){

        $self_user = new \classes\objects\UserObject($_SESSION['usuario']);

    }
    
?>

<head>
    <?php
        require_once "includes/head_default.html";
    ?>
    <div id="head">

        <?php
            $page = filter_input(INPUT_GET, 'p');

            switch($page){

                case false:
                    echo '<title>Página inicial</title>';
    
                case "autor":
                    echo '<title>Página de autor</title>';

                case "teoria_musical":
                    echo '<title>Teoria Musical</title>';
                case "song":
                    echo '<title>Música</title>'; //posteriormente será alterado para o nome da música
            }
        ?>
    </div>

    <script src="../script/ajaxify.js"></script>

</head>

<body>
    <audio id="song"></audio>
    <script src="script/jquery-3.6.0.min.js"></script>
    <script src="../script/general_functions.js"></script>
    <script src="../script/playerJs/add_song.js"></script>
    <script src="../script/genres.js"></script>
    <script src="../script/playerJs/playerCore.js"></script>
    

    <?php

        require_once "includes/theory_nav_inc.php";

        require_once "includes/nav.php";
        require_once "includes/sidebar.php";
        require_once "includes/mobile-bar.php";

        require_once "includes/player.php";
    ?>

    <main id="mainContainer">
        <?php 
            if(!$page){
                require("./pages/mainpage.php");

            }
            else if(file_exists("pages/$page.php")){
                require("./pages/$page.php");

            }
            else{
                require("./pages/noExist.php");
            }
        
        ?>
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/validate/validate_login.js"></script>
    <script src="../script/ajaxify_call.js"></script>
</body>
</html>
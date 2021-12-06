<!DOCTYPE html>
<html lang="pt-br">
<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        $self_user = $_SESSION['usuario'];
        $self_username = $self_user['username'];
        $self_art_name = $self_user['art_name'];
    }

?>

<head>

    <?php

        require_once "includes/head_default.html";

        $page = filter_input(INPUT_GET, 'p');

        switch($page){

            case false:
                echo '<title>Página inicial</title>';

            case "autor":
                echo '<title>Página de autor</title>';
        }

    ?>

</head>

<body>

    <?php   
    
        require_once "includes/nav.php";
        require_once "includes/sidebar.php";
        require_once "includes/mobile-bar.html";

    ?>

    <main class="container" id="mainContainer">
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
    
    <script src="script/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/validate_login.js">
    </script>
</body>
</html>
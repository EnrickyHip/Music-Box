<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once "includes/head_default.html";
?>

<body>
    <?php
        require_once "includes/nav.html";
        require_once "includes/sidebar.html";
        require_once "includes/mobile-bar.html";
    ?>

    <main class="container" id="mainContainer">
        <?php 
            $page = filter_input(INPUT_GET, 'p');
            if(!$page){
                require("./pages/mainpage.html");
            }elseif(file_exists("./pages/$page.php")){
                require("./pages/$page.php");
            }else{
                echo "Página não existe";
            }
        
        ?>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
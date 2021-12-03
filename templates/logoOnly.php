<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once "includes/head_default.html"
?>
<body>
    <header class="container">
        <img src="./images/logo.png" alt="logo" class="mx-auto d-block fs-6" style="height: 192px;">
    </header>

    <main>
        <?php
            $page = filter_input(INPUT_GET, 'p');
            if($page && file_exists("./pages/$page.html")){
                require("./pages/$page.html");
            }else{
                echo "Página não existe";
            }
        ?>    

    </main>
    
    <script src="script/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script/validate.js"></script>
</body>
</html>
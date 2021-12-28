<?php

require_once "includes/theory_nav_inc.php";
    $article = filter_input(INPUT_GET, 'art');

?>

<div class="container pt-5" style="padding-left: 200px;">

<?php

    if(!$article){
        require("./article/inicio.php");
    }
    else if(file_exists("article/$article.php")){
        require("./article/$article.php");

    }
    else{
        require("./pages/noExist.php");
    }

?>

</div>

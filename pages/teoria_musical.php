<?php

    $article = filter_input(INPUT_GET, 'art');

?>

<div class="container pt-5" style="padding-left: 200px;">

<?php

    if(!$article){
        require("./article/inicio.html");
    }
    else if(file_exists("article/$article.html")){
        require("./article/$article.html");

    }
    else{
        require("./pages/noExist.php");
    }

?>

</div>

<?php

    $autor = filter_input(INPUT_GET, 'a');

    if ($username == $autor){
        require "includes/autor_self.php";
    }
    else {
        require "includes/autor_other.php";
    }
?>
<?php
// esse arquivo desloga o usuário
session_start(); // inicia a sessão
session_unset(); // anula as variáveis SESSION
session_destroy(); // termina a sessão
header('Location: ../'); 
exit();
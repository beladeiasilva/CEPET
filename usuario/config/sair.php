<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['cnpj']);
unset($_SESSION['senha']);

header("Location: /cepet/usuario/inicial.php");


?>
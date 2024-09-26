<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['ongcnpj']);
unset($_SESSION['ongsenha']);

header("Location: /conexao/paginas/login.php");


// session_start();
// unset($_SESSION['ongcnpj']);
// unset($_SESSION['ongsenha']);
// header("Location: login.php");


?>
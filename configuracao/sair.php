<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['cnpj']);
unset($_SESSION['senha']);

header("Location: /conexao/paginas/inicial.php");


// session_start();
// unset($_SESSION['ongcnpj']);
// unset($_SESSION['ongsenha']);
// header("Location: login.php");


?>
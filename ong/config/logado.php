<?php
 session_start();

if((!isset($_SESSION['cnpj'])) || (!isset($_SESSION['senha']))) {
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);

    
    header("location: /cepet/ambos/login.php");
    
} else {
    
    $logado = true;
    $cnpj = $_SESSION['cnpj'];
}

?>
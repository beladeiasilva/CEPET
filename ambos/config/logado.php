<?php


if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
} else {
    $logado = true;
    $id = $_SESSION['id'];  // ID do usuário
}

if((!isset($_SESSION['cnpj']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);
 
} else {
    $logado = true;
    $ong= $_SESSION['ong'];
}
?>
<?php
session_start();

if (!isset($_SESSION['email']) ==true || !isset($_SESSION['senha'])==true) {
    $logado = false;
    unset($_SESSION['email']);
    unset($_SESSION['senha']);

  
} else {

 
    $logado = true;
    $id = $_SESSION['id'];  // ID do usuário
    
}
?>
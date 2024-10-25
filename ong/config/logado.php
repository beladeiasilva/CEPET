<?php
 

if((!isset($_SESSION['cnpj'])) || (!isset($_SESSION['senha']))) {
   
 //header("location: /cepet/ambos/login.php");
    
} else {
    
    $logado = true;
    $cnpj = $_SESSION['cnpj'];
}

?>
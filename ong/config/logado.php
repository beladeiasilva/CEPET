<?php
if((!isset($_SESSION['cnpj']) == true) and (!isset($_SESSION['senha']) == true)) {
   
    header('location: /cepet/usuario/inicial.php');
    
} else {
    $logado = true;
    $ong_nome = $_SESSION['ong'];
}
?>
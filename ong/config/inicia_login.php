<?php

//print_r($_REQUEST);

 if(isset($_POST['ongentrar']) && !empty($_POST['ongcnpj']) && !empty($_POST['ongsenha']))

 {
// //Acessa
 include('conexao.php');
 $cnpj = $_POST['ongcnpj'];
 $senha_verdadeira = $_POST['ongsenha'];



$sql1 ="SELECT * FROM ongs WHERE CNPJ='$cnpj'";
$result = $mysqli->query($sql1);

$senha_cript = $result->fetch_assoc();
$senha_cript['SENHA'];


if (password_verify($senha_verdadeira, $senha_cript['SENHA']) ==true)
{
    session_start();
    
    $sql ="SELECT * FROM ongs WHERE CNPJ='$cnpj'";
    $result = $mysqli->query($sql);
    $ong = $result->fetch_assoc();

    $_SESSION['ong'] = $ong['NOME'];
    $_SESSION['senha'] = password_verify($senha_verdadeira, $senha_cript['SENHA']);
    $_SESSION['cnpj'] = $cnpj;
    
    header("Location: /cepet/ong/inicial.php"); 
 }
 else
{
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);

    header('Location: /cepet/ambos/login.php');
    }

 }
else
{
header("Location: /cepet/ambos/login.php");
}   


?>



      
        
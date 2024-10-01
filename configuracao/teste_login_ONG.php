<?php

//print_r($_REQUEST);

 if(isset($_POST['ongentrar']) && !empty($_POST['ongcnpj']) && !empty($_POST['ongsenha']))

 {
// //Acessa
 include('conexao.php');
 $cnpjO = $_POST['ongcnpj'];
 $senhaO = $_POST['ongsenha'];


// //Testar se o login está mandando infor mações para as variaveis:
//  print_r('cnpj: ' . $cnpjO);
//  print_r('senha: ' . $senhaO);

$sql ="SELECT * FROM ongs WHERE CNPJ='$cnpjO'";
$result = $mysqli->query($sql);

$ong = $result->fetch_assoc();


if (password_verify($senhaO, $ong['SENHA']) ==true)
{
    
    session_start();
    
    $sql ="SELECT * FROM ongs WHERE CNPJ='$cnpjO'";
    $result = $mysqli->query($sql);
    $ong = $result->fetch_assoc();

    $_SESSION['ong'] = $ong['NOME'];
    $_SESSION['senha'] = password_verify($senhaO, $ong['SENHA']);
    $_SESSION['cnpj'] = $cnpjO;
    
    header("Location: /conexao/paginas/inicialong.php"); 
 }
 else
{
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);

    header('Location: /conexao/paginas/login.php');
    }

 }
else
{
header("Location: /conexao/paginas/login.php");
}   


?>



      
        
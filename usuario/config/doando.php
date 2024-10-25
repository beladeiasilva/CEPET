<?php
if(isset($_POST['doar'])) 
{
  include("config/conexao.php");
//----------------Declarando váriaveis pelo método POST-------//
$ongs = $_POST['ongs'];
$form_pag =$_POST['paymentMethod'];
$dinheiro  =$_POST['valor'];
$nomeU = $_SESSION['usuario'];
//------------------------------------------------------------//

//----------------Utilizando da váriavel "$ongs" o nome registrado do BD, para pesquisar o CNPJ---------------//
$sql2 = "SELECT * FROM ongs WHERE NOME = '$ongs'";
$vcnpj = mysqli_query($mysqli, $sql2);
$cnpjO = mysqli_fetch_assoc($vcnpj);
$cnpj = $cnpjO['CNPJ'];
//------------------------------------------------------------------------------------------------------------//

//-----------------Utilizando da váriavel "$nomeU" o nome registrado da SESSÃO, para pesquisar o ID_USUARIO---//
 $sql3 = "SELECT * FROM usuarios WHERE NOME_DE_USUARIO = '$nomeU'";
 $vidU = mysqli_query($mysqli, $sql3);
 $idU = mysqli_fetch_assoc($vidU);
 $id = $idU['ID_USUARIO'];
//------------------------------------------------------------------------------------------------------------//


//----------------------------------------INSERINDO AO BANCO DE DADOS-----------------------------------------//
 $result2 = mysqli_query($mysqli, "INSERT INTO DOACAO(FORM_PAG, VALOR_PAG, DATA_PAG, HORA_PAG, FK_USUARIO_ID, FK_ONG_CNPJ)
 VALUES ('$form_pag','$dinheiro',now(),now(),'$id','$cnpj')");
//------------------------------------------------------------------------------------------------------------//

header('Location: inicial.php');
}
?>
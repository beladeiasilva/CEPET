<?php

if(isset($_POST['doar'])) 
{
  include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
//----------------Declarando váriaveis pelo método POST-------//
$ongs = $_POST['ongs'];
$form_pag =$_POST['paymentMethod'];
$dinheiro  =$_POST['valor'];
//------------------------------------------------------------//

//----------------Utilizando da váriavel "$ongs" o nome registrado do BD, para pesquisar o CNPJ---------------//
$sql2 = "SELECT * FROM ongs WHERE NOME = '$ongs'";
$vcnpj = mysqli_query($mysqli, $sql2);
$cnpjO = mysqli_fetch_assoc($vcnpj);
$cnpj = $cnpjO['CNPJ'];
//------------------------------------------------------------------------------------------------------------//


//----------------------------------------INSERINDO AO BANCO DE DADOS-----------------------------------------//
 $result2 = mysqli_query($mysqli, "INSERT INTO DOACAO(FORM_PAG, VALOR_PAG, DATA_PAG, HORA_PAG, FK_USUARIO_ID, FK_ONG_CNPJ)
 VALUES ('$form_pag','$dinheiro',now(),now(),'$id','$cnpj')");
//------------------------------------------------------------------------------------------------------------//

header("Location: /cepet/usuario/pixdoacao.php?id=$cnpj");
}


?>
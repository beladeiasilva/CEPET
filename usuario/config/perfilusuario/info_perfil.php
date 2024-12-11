<?php
include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");

$sql="SELECT ID_USUARIO FROM USUARIOS WHERE ID_USUARIO = '$id'";
$result = mysqli_query($mysqli, $sql);

while($id_usuario = mysqli_fetch_assoc($result)) {
$link_editar= "<a href='/cepet/usuario/editcadastro.php?ID_USUARIO=$id_usuario[ID_USUARIO]'>Editar</a>";

 } 

 //-------------------------------------------TRAZENDO OS DADOS DO BD-----------------------------------------------------------------//
 $sql="SELECT NOME_COMPLETO, DATA_DE_NASCIMENTO, GENÊRO, EMAIL, TELEFONE, 
 CIDADE, BAIRRO, RUA, NUM_CASA, CEP, UF FROM usuarios WHERE ID_USUARIO = '$id'";

 $result=mysqli_query($mysqli, $sql);
 $dados = mysqli_fetch_assoc($result);
 $nome= $dados['NOME_COMPLETO'];
 $data_nasc= $dados['DATA_DE_NASCIMENTO'];
 $genero= $dados['GENÊRO'];
 $email= $dados['EMAIL'];
 $telefone= $dados['TELEFONE'];
 $cidade= $dados['CIDADE'];
 $bairro= $dados['BAIRRO'];
 $rua= $dados['RUA'];
 $numero= $dados['NUM_CASA'];
 $cep= $dados['CEP'];
 $uf= $dados['UF'];

 
 ?>
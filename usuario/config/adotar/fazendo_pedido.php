<?php
if(!empty($_GET['ID_PET']) && isset($_POST['submit'])){

  
$id_pet = $_GET['ID_PET'];
include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
$sql1="SELECT * FROM pets WHERE ID_PET = '$id_pet'";
$sql2="SELECT * FROM adocao WHERE FK_PET_ID='$id_pet' and FK_USUARIO_ID='$id'";
$result1=mysqli_query($mysqli, $sql1);
$result2=mysqli_query($mysqli, $sql2);

$cnpj=mysqli_fetch_assoc($result1);
$cnpj['FK_ONG_CNPJ'];


if($result2->num_rows > 0){
die("<link rel='stylesheet' type='text/css' href='css/adotar.css'>
    <link rel='stylesheet' type='text/css' href='css/padrao.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='img/logos/icon.ico'>
       <style>
       a:link{
       text-decoration:none;}
       </style>
       <br><br><br><br><br><br><br>
        <h1> Você já solicitou o pedido de adoção deste Pet! </h1>
        <br> <br> <br>
        <a href='adocao.php'><button class='btn' type='btn'>Retornar</button></a>");
}
else{
$result= mysqli_query($mysqli, "INSERT INTO ADOCAO (DATA_ADO, HORA_ADO, FK_PET_ID, FK_USUARIO_ID, FK_ONG_CNPJ) VALUES (now(), now(),'$id_pet','$id','$cnpj[FK_ONG_CNPJ]')");
}

header("Location: /cepet/usuario/adotar_pedido_realizado.php");
}

?>





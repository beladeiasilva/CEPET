<?php 
$cnpj= $_GET["id"];

include("config/conexao.php");
$sql = mysqli_query($mysqli, "SELECT * FROM ongs where CNPJ = '$cnpj'");
$dados = mysqli_fetch_assoc($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/adotar.css'>
    <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/padrao.css'>
    <link rel='icon' href='/cepet/usuario/img/logos/icon.ico'>
    <title>Document</title>
</head>
<body>
    


<style>
                a:link{
                text-decoration:none;}
</style>
                <br><br><br><br><br><br><br>
                <h3>PIX:</h3> <br><br>
                    <h1><?php echo $dados["PIX"];?></h1>
                    <br> <br> <br>
                    <a href='/cepet/usuario/inicial.php'><button class='btn' type='btn'>Retornar</button></a>


</body>
</html>
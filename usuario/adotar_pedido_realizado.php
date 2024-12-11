<?php

// Verifica se o usuário está logado
include("config/logado.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adotar.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adotar</title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>

<body>
<?php include 'padrao/header.php'; ?>

<br><br><br><br><br><br>

<h2>Agora é só aguardar o contato da ONG/protetor</h2>
<p>Obrigado por se interessar em adotar! A ONG entrará em contato com você em breve.</p>
<br><br>
<style>
    a:link{
        text-decoration: none;
    }
</style>
<a href="inicial.php"><button class="btn" name="submit">Retornar</button></a>

    <?php include 'padrao/footer.php'; ?>



    
</body>
</html>
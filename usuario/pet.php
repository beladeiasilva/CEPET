<?php

    include("config/pet/infopet.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilopet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <title>Perfil do Pet</title>
    <link rel="icon" href="img/logos/icon.ico">
</head>
<body>

<header>
<div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
    <div class="logoimg">
    </div>
    <div class="headerlogin">
            
                 
                <!------------------------------------------------------------------------------------------------------->

</header>

<nav>
    <ul class="barra-navegacao">
    <li><a href="adocao.php">Adoção</a></li>
        <li><a href="ONGs.php">ONGs</a></li>
        <li><a href="doacao.php">Doação</a></li>
        <li><a href="consultas.php">Consulta</a></li>
        <li><a href="noticias.php">Notícias e dicas</a></li>
    </ul>
</nav>
<main>
<div class="container">
<div class="pet-card">
    <div class="header">
        
        <span class="ong-nome"><?php echo $pet['ONG_NOME']; ?></span>
        <span class="estado"><strong><?php echo $pet['ESTADO']; ?></strong></span>
    </div>
    <div class="pet-info">
        <img src="/cepet/cadastro/img/imagens_pets_cadastrados/<?php echo $pet['LINK_FOTO']; ?>" alt="Foto do Pet" class="pet-img">
        <div class="info">
            <h1><?php echo $pet['NOME']; ?></h1>
            <h2><?php echo $pet['RAÇA']; ?></h2>
            <ul>
                <li>Idade: <strong><?php echo $pet['IDADE']; ?></strong></li>
                <li>Porte: <strong><?php echo $pet['PORTE']; ?></strong></li>
                <li>Gênero: <strong><?php echo $pet['GENERO']; ?></strong></li>
                <li>Cor: <strong><?php echo $pet['COR']; ?></strong></li>
            </ul>

            <p><?php echo $pet['HISTÓRICO']; ?></p>
        </div>
        <div class="pet-paw"></div>
    </div>
</div></div>


</main>

<?php 

echo"<a name='adotar' href='/cepet/cadastro/cadastrousuario2.php?ID_PET=$_GET[ID_PET]'>
    <button class='adotar-button' name='adotar'><strong>Realizar pedido de adoção!</strong></button>
</a>";?>
</form>

<?php include 'padrao/footer.php'; ?>

</body>
</html>

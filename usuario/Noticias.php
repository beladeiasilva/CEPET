<?php

// Verifica se o usuário está logado
include("config/logado.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilonoticia.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
<?php include 'padrao/header.php'; ?>


<section class="noticias-section">
        <div class="container">
            <h1>Notícias e Dicas</h1>
           

        <div class="noticia-destaque" onclick="window.location.href='noticias/1.php';">
                <img src="img/animais/dog (1).jpg" alt="Cachorro com dono no Brasil">
                <div class="destaque-content">
                    <h2>Pesquisa indica que 32% dos cães e 52% dos gatos com dono no Brasil são Sem Raça Definida</h2>
                    <p>Um pesquisa indica que 32% dos cães e 52% dos gatos com dono no Brasil são Sem Raça Definida (SRD), convívio destes animais tem se mostrado muito popular entre os brasileiros.</p>
                </div>
        </div>

    <div class="noticias-grid">
        <a href="noticias/2.php">
            <div class="noticia-item">
                <img src="img/animais/cat (2).jpg" alt="Curiosidades sobre gatos">
                <h3>13 curiosidades sobre gatos que vão te fascinar</h3>
            </div>
        </a>
        <a href="noticias/3.php">
            <div class="noticia-item">
                <img src="img/animais/dog (3).jpg" alt="Saúde Animal">
                <h3>Saúde animal: dicas importantes para garantir o bem-estar dos bichos de estimação</h3>
            </div>
        </a>
        <a href="noticias/4.php">
            <div class="noticia-item">
                <img src="img/animais/dog (4).jpg" alt="Alimentos que cachorro não pode comer">
                <h3>Alimentos que cachorro não pode comer: veja os motivos</h3>
            </div>
        </a>
        <a href="noticias/5.php">
            <div class="noticia-item">
                <img src="img/animais/cat (5).jpg" alt="Castrar seu animal">
                <h3>A importância de castrar seu animal</h3>
            </div>
        </a>
        <a href="noticias/6.php">
            <div class="noticia-item">
                <img src="img/animais/dog (6).jpg" alt="Adotar um pet">
                <h3>Por que adotar um pet?</h3>
            </div>
        </a>
        <a href="noticias/7.php">
            <div class="noticia-item">
                <img src="img/animais/cat (7).jpg" alt="Coletar antipulgas">
                <h3>Antipulgas: Dicas Para Escolher o Melhor Produto Para Seu Animal</h3>
            </div>
        </a>
    </div>


            <div class="pagination">
                <span>Página 1 de 3</span>
            </div>
        </div>
    </section>

    <?php include 'padrao/footer.php'; ?>
</body>
</html>
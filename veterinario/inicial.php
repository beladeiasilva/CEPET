<?php

// Verifica se o usuário está logado
include("config/logado.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/cepet/usuario/css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/cepet/usuario/css/padrao.css">
    <title>Cepet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="icon" href="/cepet/usuario/img/logos/icon.ico"> 
</head>
<body>



    <?php include 'padrao/header.php'; ?>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <div class="banner" id="banner">
    <div> 
        <div class="divbanner1" onclick="window.location.href='/cepet/ambos/login.php';"></div>
    </div>

    <div>
    <div class="divbanner2" onclick="window.location.href='noticias/1.php';"></div>
    </div>

    <div>
    <div class="divbanner3" onclick="window.location.href='doacao.php';"></div>
    </div>

    </div>

        <div class="conhecaongs" onclick="window.location.href='ongs.php';">
        <h1>Conheça as ONGs</h1>
        
        <div class="carroselconhecaongs">
            <img src="img/foto ongs/5.png" class="imagem-arredondada">
            <img src="img/foto ongs/6.png" class="imagem-arredondada">
            <img src="img/foto ongs/7.png" class="imagem-arredondada">
            <img src="img/foto ongs/8.png" class="imagem-arredondada">
            <img src="img/foto ongs/9.png" class="imagem-arredondada">
            <img src="img/foto ongs/10.png" class="imagem-arredondada">
        </div>
        </div>
        
        <section class="amigos-section"> 
    <div class="container" onclick="window.location.href='adocao.php';">
        <h1>Encontre seu amigo aqui</h1>
        <div class="amigos-gallery">
            <div class="amigo-item">
                <img src="img/animais/cat (10).jpg" alt="Gato 1">
            </div>
            <div class="amigo-item">
                <img src="img/animais/cat (9).jpg" alt="Gato 2">
            </div>
            <div class="amigo-item">
                <img src="img/animais/cat (8).jpg" alt="Gato 3">
            </div>
            <div class="amigo-item">
                <img src="img/animais/dog (15).jpg" alt="Cachorro 1">
            </div>
            <div class="amigo-item">
                <img src="img/animais/dog (14).jpg" alt="Cachorro 2">
            </div>
            <div class="amigo-item">
                <img src="img/animais/dog (13).jpg" alt="Cachorro 3">
            </div>
            <div class="amigo-item">
                <img src="img/animais/cat (7).jpg" alt="Gato 4">
            </div>
            <div class="amigo-item">
                <img src="img/animais/dog (11).jpg" alt="Cachorro 4">
            </div>
            <div class="amigo-item">
                <img src="img/animais/dog (10).jpg" alt="Cachorro 5">
            </div>
            <div class="amigo-item">
                <img src="img/animais/cat (6).jpg" alt="Gato 5">
            </div>
        </div>
    </div>
</section>



        

    <script>
        $(document).ready(function() {
            $('.banner').slick({
                infinite: true,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false, // As setas foram removidas
                autoplay: true,     
                autoplaySpeed: 2000 
            });
        });
    </script>
    
<?php include 'padrao/footer.php'; ?>
</body>
</html>

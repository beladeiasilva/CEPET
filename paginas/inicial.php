<?php
session_start();

    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true)and(!isset($_SESSION['senha'])==true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['usuario']);
    }
    else
    {
        echo  '<h2>',$_SESSION['usuario'],'<h2>';
        echo "<button class = 'link_sair'>
        <a class='link_sair' href='/conexao/configuracao/sair.php'><h4> Sair </h4>
        </a>
        </button>";}

?>    
<!-----------------------------------HTML DO FORMULÁRIO------------------------------------------------------>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="icon" href="img/logos/icon.ico"> 
    <script src="jscript/main.js" defer></script>
</head>
<body>




    <header>
        <div class="logoimg">
            <img src="img/logos/cepet-preto.png" width="20%" alt="Logo Cepet">
        </div>
        <div class="headerlogin">
        <a href="login.php">
            Faça o login </a>
             <p> ou </p>
        <a href="/conexao/forms_cd/cadastrousuario.php">
              Cadastre-se!</a>
             </div>
            <img class="pessoa" src="img/icones variados/perfil.png">
        
        
        </header>

        <nav>
        <!--Troca para o nome dos outros htmls para ir para outra página. href="Index.html"-->
        <ul class="barra-navegacao">
            <li><a href="#Adocao">Adoção</a></li>
            <li><a href="#ONGs">ONGs</a></li>
            <li><a href="#Doações">Doação</a></li>
            <li><a href="#Noticias">Noticias e dicas</a></li>
        </ul>
        </nav>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <div class="banner" id="banner">
    <div>    
    <article class="article1">
            <h2>Amor de verdade não se compra, se encontra</h2>
            <button>Acesse para Adotar</button>    
        </article>
        <img src="img/animais/dog (3).png" />
    </div>
    <div>
        <article>
        <h2>Título do Artigo</h2>
        <p>Este é o conteúdo do artigo, que pode incluir texto, imagens e outros elementos.</p>    
    </article>
            <img src="img/animais/dog(1).png">  
        </div>
    <div>
        <article>
        <h2>Título do Artigo</h2>
        <p>Este é o conteúdo do artigo, que pode incluir texto, imagens e outros elementos.</p>
        </article>
            <img src="img/animais/dog (2).png" />
    </div>
    <div>
        <article>
        <h2>Título do Artigo</h2>
        <p>Este é o conteúdo do artigo, que pode incluir texto, imagens e outros elementos.</p>
        </article>
            <img src="img/animais/dog (4).png" />
    </div>
    <div>
        <article>
        <h2>Título do Artigo</h2>
        <p>Este é o conteúdo do artigo, que pode incluir texto, imagens e outros elementos.</p>
        </article>
            <img src="img/animais/dog (5).png" /></div>
    </div>

    <div class="carrosel-ONG">
        <h3>Conheça as ONGs</h3>
        
            <a href=""><img src="img/foto ongs/ong-das-patinhas.jpg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/patinhas-que-brilham.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/sempre-ao-seu-lado.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/cidadania-animal.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/gavaa.jpeg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/vira-lata-e-dez.jpeg" class="imagem-arredondada"></a>
        </div>

</body>
</html>
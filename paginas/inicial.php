<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
} else {
    $logado = true;
    $usuario = $_SESSION['usuario'];  // Nome do usuário
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
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
            <a href="/conexao/paginas/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>
                <span class="user-name">Olá, <?php echo $usuario; ?> !</span>
                
                    <a class="link_sair" href="/conexao/configuracao/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="login.php">Faça o login </a>
                <p> ou </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>
    </header>

    <nav>
        <ul class="barra-navegacao">
            <li><a href="adocao.php">Adoção</a></li>
            <li><a href="#ONGs">ONGs</a></li>
            <li><a href="doacao.php">Doação</a></li>
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
            <a href="adocao.php"><button>Acesse para Adotar</button></a> 
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
        </div>
</div>

        <div class="conhecaongs">
        <h3>Conheça as ONGs</h3>
        </div>
        <div class="carrosel-ONG">
            <a href=""><img src="img/foto ongs/ong-das-patinhas.jpg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/patinhas-que-brilham.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/sempre-ao-seu-lado.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/cidadania-animal.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/gavaa.jpeg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/vira-lata-e-dez.jpeg" class="imagem-arredondada"></a>
        </div>


        <footer> 
            
        <p> teste</p>
        
        </footer>
    
</body>
</html>
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
    <link rel="stylesheet" type="text/css" href="css/estilonoticia.css">
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="icon" href="img/logos/icon.ico"> 
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
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>

<section class="noticias-section">
        <div class="container">
            <h1>Notícias e Dicas</h1>
           
        <div class="noticia-destaque">
                <img src="img/animais/dog (1).jpg" alt="Cachorro com dono no Brasil">
                <div class="destaque-content">
                    <h2>Pesquisa indica que 32% dos cães e 52% dos gatos com dono no Brasil são Sem Raça Definida</h2>
                    <p>Um pesquisa indica que 32% dos cães e 52% dos gatos com dono no Brasil são Sem Raça Definida (SRD), convívio destes animais tem se mostrado muito popular entre os brasileiros.</p>
                </div>
        </div>

    <div class="noticias-grid">
        <a href="link-da-noticia-1">
            <div class="noticia-item">
                <img src="img/animais/cat (2).jpg" alt="Curiosidades sobre gatos">
                <h3>13 curiosidades sobre gatos que vão te fascinar</h3>
            </div>
        </a>
        <a href="link-da-noticia-2">
            <div class="noticia-item">
                <img src="img/animais/dog (3).jpg" alt="Saúde Animal">
                <h3>Saúde animal: dicas importantes para garantir o bem-estar dos bichos de estimação</h3>
            </div>
        </a>
        <a href="link-da-noticia-3">
            <div class="noticia-item">
                <img src="img/animais/dog (4).jpg" alt="Alimentos que cachorro não pode comer">
                <h3>Alimentos que cachorro não pode comer: veja os motivos</h3>
            </div>
        </a>
        <a href="link-da-noticia-4">
            <div class="noticia-item">
                <img src="img/animais/cat (5).jpg" alt="Castrar seu animal">
                <h3>A importância de castrar seu animal</h3>
            </div>
        </a>
        <a href="link-da-noticia-5">
            <div class="noticia-item">
                <img src="img/animais/dog (6).jpg" alt="Adotar um pet">
                <h3>Por que adotar um pet?</h3>
            </div>
        </a>
        <a href="link-da-noticia-6">
            <div class="noticia-item">
                <img src="img/animais/cat (7).jpg" alt="Coletar antipulgas">
                <h3>Coletar antipulgas: dicas para você escolher o melhor para seu animal</h3>
            </div>
        </a>
    </div>


            <div class="pagination">
                <span>Página 1 de 3</span>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="faq-section">
                <h3>Dúvidas ?</h3>
                <ul>
                    <li>Como funciona a adoção?</li>
                    <li>Como doar?</li>
                    <li>Como cadastrar minha ong?</li>
                </ul>
                <br>
                <h3>Acompanhe a Cepet nas redes</h3>
                <div class="social-links">
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/twitter.png" alt="Twitter"></a>
                </div>
            </div>
            <div class="suggestion-section">
                <h3>Sugestões</h3>
                <p>Nos ajude a melhorar deixando sua sugestão:</p>
                <textarea placeholder="Digite sua sugestão de melhoria :"></textarea>
                <button>Enviar</button>
            </div>
      
        </div>
        <p>© 2024 Cepet - Todos os direitos reservados.</p>
    </footer>
</body>
</html>
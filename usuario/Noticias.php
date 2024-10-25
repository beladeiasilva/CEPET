<?php
session_start();

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

    <header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>

                <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá, <?php 
                include("config/conexao.php");  $sql ="SELECT NOME_DE_USUARIO FROM usuarios WHERE ID_USUARIO = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME_DE_USUARIO'];
                echo $nome['NOME_DE_USUARIO']; ?> !</span>
                 <!------------------------------------------------------------------------------------------------------->

                    <a class="link_sair" href="config/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login </a>
                <p>/</p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>

         <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include("config/conexao.php");
        $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id' ";
        $result2= mysqli_query($mysqli, $sql2);
        $img_perfil = mysqli_fetch_assoc($result2);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='perfilusuario.php'><img class='pessoa' src='img/imagens_perfil/$img_perfil[IMG_PERFIL]'>";}
        ?>
        <!----------------------------------------------------------------------------------------------------->

    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="adocao.php">Adoção</a></li>
        <li><a href="ONGs.php">ONGs</a></li>
        <li><a href="doacao.php">Doação</a></li>
        <li><a href="Noticias.php">Notícias e dicas</a></li>
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
                    <a href="#"><img src="img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="img/redes sociais/twitter.png" alt="Twitter"></a>
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
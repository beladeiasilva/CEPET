<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
} else {
    $logado = true;
    $id = $_SESSION['id'];  // ID do usuário
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <title>Cepet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>

    <header>
        <div class="logoimg">
            <a href="/conexao/paginas/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>
                
                <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá,<?php 
                include('conexao.php');  $sql ="SELECT NOME_DE_USUARIO FROM usuarios WHERE ID_USUARIO = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME_DE_USUARIO'];
                echo $nome['NOME_DE_USUARIO']; ?> !</span>
                <!------------------------------------------------------------------------------------------------------->

                    <a class="link_sair" href="/conexao/configuracao/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="login.php">Faça o login </a>
                <p> / </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>

        <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include('conexao.php');
        $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO ='$id'";
        $result2= mysqli_query($mysqli, $sql2);
        $img_perfil = mysqli_fetch_assoc($result2);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='perfil/perfilusuario.php'><img class='pessoa' src='perfil/imagens_perfil/$img_perfil[IMG_PERFIL]'/> </a>";}
        ?>
         <!----------------------------------------------------------------------------------------------------->
    </header>


    <nav>
    <ul class="barra-navegacao">
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
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
    </div><div>
    <article>
        <h2>Transforme Vidas: Adote um Amigo!</h2>
        <p>Você sabia que ao adotar um animal, você não está apenas ganhando um novo amigo, mas também salvando uma vida? No CEPET, oferecemos um espaço seguro para que você conheça diversos pets à espera de um lar. Venha fazer a diferença!</p>    
    </article>
    <img src="img/animais/dog (1).png">  
</div>

<div>
    <article>
        <h2>Doe e Faça a Diferença!</h2>
        <p>As ONGs precisam de você! Com sua contribuição, podemos garantir que mais animais recebam cuidados, abrigo e amor. Cada doação conta! Junte-se a nós na luta pela proteção dos nossos amigos de quatro patas.</p>
    </article>
    <img src="img/animais/dog (2).png" >
</div>

<div>
    <article>
        <h2>Conheça as ONGs Parceiras</h2>
        <p>No CEPET, trabalhamos em colaboração com diversas ONGs dedicadas ao bem-estar animal. Descubra suas histórias, saiba como elas operam e como você pode contribuir. Juntos, podemos criar um futuro melhor para os animais!</p>
    </article>
    <img src="img/animais/dog (4).png">
</div>

<div>
    <article>
        <h2>Espalhe o Amor: Adote ou Doe!</h2>
        <p>Seja parte da mudança! Ao adotar um animal ou fazer uma doação, você está promovendo um ciclo de amor e compaixão. No CEPET, acreditamos que cada ato de bondade conta. Venha nos conhecer e faça parte dessa história!</p>
    </article>
</div>

</div>

        <div class="conhecaongs">
        <h1>Conheça as ONGs</h1>
        
        <div class="carroselconhecaongs">
            <a href=""><img src="img/foto ongs/ong-das-patinhas.jpg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/patinhas-que-brilham.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/sempre-ao-seu-lado.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/cidadania-animal.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/gavaa.jpeg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/vira-lata-e-dez.jpeg" class="imagem-arredondada"></a>
        </div>
        </div>
        
        <section class="amigos-section">
        <div class="container">
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
</body>
</html>
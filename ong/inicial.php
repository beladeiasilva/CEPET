<?php


include("config/logado.php");

?>    
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <title>Cepet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
</head>
<body>

    <?php include("padrao/header.php"); ?>
    
    <nav>
    <ul class="barra-navegacao">
        <li>Pets</a></li>
        <li>ONGs</a></li>
        <li>Doação</a></li>
        <li>Notícias e dicas</a></li>
    </ul>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <div class="banner" id="banner">
    <div>    
    <article class="article1">
            <h2>Amor de verdade não se compra, se encontra</h2>
            <a href="/cepet/cadastro/cadastropet.php"><button>Cadastre o Pet Aqui!</button></a> 
        </article>
        <img src="img/animais/dog (3).png" />
    </div>
    <div>
    <article>
        <h2>Amplie sua Visibilidade!</h2>
        <p>No CEPET, sua ONG terá uma vitrine para mostrar seu trabalho. Aumente a visibilidade da sua missão e alcance mais pessoas dispostas a apoiar suas iniciativas. Juntos, podemos fazer a diferença!</p>
    </article>
    <img src="img/animais/dog(1).png">  
</div>

<div>
    <article>
        <h2>Facilidade na Captação de Recursos!</h2>
        <p>Com a plataforma CEPET, você terá acesso a um sistema integrado de doações, facilitando a captação de recursos para sua ONG. Cada contribuição ajuda a garantir o cuidado e o bem-estar dos animais que você resgata!</p>
    </article>
    <img src="img/animais/dog (2).png">
</div>

<div>
    <article>
        <h2>Conexões que Transformam!</h2>
        <p>Participe de uma comunidade de ONGs comprometidas com a causa animal. No CEPET, você pode trocar experiências, dicas e até parcerias que podem fortalecer o seu trabalho e potencializar o impacto social da sua ONG.</p>
    </article>
    <img src="img/animais/dog (4).png">
</div>

<div>
    <article>
        <h2>Acesso a Informação e Treinamento!</h2>
        <p>As ONGs cadastradas no CEPET terão acesso a materiais educativos e oportunidades de treinamento que podem ajudar na gestão da sua organização. Invista no conhecimento e melhore a eficiência das suas ações!</p>
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
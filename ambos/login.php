<?php
session_start();

// Verifica se o usuário está logado
include("config/logado.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilologin.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logos/icon.ico"> 
    <script src="jscript/main.js" defer></script>
</head>
<body>

    <header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
    

    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="adocao.php">Adoção</a></li>
        <li><a href="ONGs.php">ONGs</a></li>
        <li><a href="doacao.php">Doação</a></li>
        <li><a href="Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>

    <div class="login">
        <form action="/cepet/usuario/config/inicia_login.php"  method= "POST">
            
        <h1>Login Usuário</h1>
      
        <input type="email" name="email"  id="email" placeholder="Email">
      
        <br>
       
        <input type="password" name="senha"  id="senha" placeholder="Senha">

        <br>
        
        <input type="submit" name="usuarioentrar"  id="entrar" value="Entrar">
        <div class ="d-flex">
            <a href="/cepet/cadastro/cadastrousuario.php" type="button" class="btn">Cadastro de Usuário Aqui! </a>
        </div>

        </form>
       
        
        <form action="/cepet/ong/config/inicia_login.php"  method= "POST">

        <h1>Login ONG</h1>
        <input type="text" name="ongcnpj" id="ongcnpj" placeholder="Cnpj">

        <script>
        document.getElementById('ongcnpj').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
        });
        </script>


        <br> 
        <input type="password" name="ongsenha" id="ongsenha" placeholder="Senha">
        <br>
        <input type="submit" name="ongentrar" id="entrar" value="Entrar">
        
        <div class ="d-flex">
            <a href="/cepet/cadastro/cadastroong.php" type="button" class="btn"> Cadastre de ONG Aqui!</a>
        </div>

        </form> 
    </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
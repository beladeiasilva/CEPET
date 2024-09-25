<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
    <script src="jscript/main.js" defer></script>
</head>
<body>

    <header>
        <img src="img/logos/cepet-preto.png" width="10%" alt="Logo Cepet">

        <a class="cadastro" href="CadastroUsuario.html">
            Faça login ou cadastre-se 
            <img src="img/icones variados/perfil.png">
        </a>

        <!Troca para o nome dos outros htmls para ir para outra página. href="Index.html">
        <ul class="barra-navegacao">
            <li><a href="#Adocao">Adoção</a></li>
            <li><a href="#ONGs">ONGs</a></li>
            <li><a href="#Doações">Doação</a></li>
            <li><a href="#Noticias">Noticias e dicas</a></li>
        </ul>
    </header>

    <div>

        <form action="testelogin.php" method= "POST">

        <h1>Login Usuário</h1>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="senha" placeholder="Senha">
        <br> 
        <input type="submit" name="usuarioentrar" value="Entrar">

        <br>

        <h1>Login ONG</h1>
        <input type="number" id="ongcnpj" placeholder="CNPJ">
        <br> 
        <input type="password" id="ongsenha" placeholder="Senha">
        <br>
        <input type="submit" name="ongentrar" value="Entrar">
        
        
        <div class ="d-flex">
            <a href="cadastrousuario.php" type="button" class="btn">Cadastro de usuário</a>
            <br>
            <a href="cadastroong.php" type="button" class="btn"> Cadastre de ONG</a>

           <!--PRECISA COLOCAR EM OUTRA PAGINA SÓ PARA ONG 
           <a href="cadastropet.php" type="button" class="btn">Cadastre seu PET aqui!</a>
           -->

        </div>

        </form> 
    </div>
</body>
</html>
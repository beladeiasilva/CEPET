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
    <div>
        <h1>Login</h1>

        <form action="testelogin.php" method= "POST">


        <input type="text" name="email" placeholder="Email">
        <br> <br>
        <input type="password" name="senha" placeholder="Senha">
        <br> <br>
        <input type="submit" name="entrar" value="Entrar">
        <br> <br>
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
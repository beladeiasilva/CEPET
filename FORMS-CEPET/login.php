<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
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
            <br> <br>
            <a href="cadastropet.php" type="button" class="btn">Cadastre seu PET aqui!</a>
        </div>

        </form> 
    </div>
</body>
</html>
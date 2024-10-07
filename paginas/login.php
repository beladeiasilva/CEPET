<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/estilologin.css">
    <link rel="icon" href="img/logos/icon.ico">  
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

    <div class="login">
        <form action="/conexao/configuracao/teste_login_USUARIO.php"  method= "POST">
            
        <h1>Login Usuário</h1>
      
        <input type="email" name="email"  id="email" placeholder="Email">
      
        <br>
       
        <input type="password" name="senha"  id="senha" placeholder="Senha">

        <br>
        
        <input type="submit" name="usuarioentrar"  id="entrar" value="Entrar">
        <div class ="d-flex">
            <a href="/conexao/forms_cd/cadastrousuario.php" type="button" class="btn">Cadastro de Usuário Aqui! </a>
        </div>

        </form>
       
        
        <form action="/conexao/configuracao/teste_login_ONG.php"  method= "POST">

        <h1>Login ONG</h1>
        <input type="number" name="ongcnpj" id="ongcnpj" placeholder="Cnpj">
        <br> 
        <input type="password" name="ongsenha" id="ongsenha" placeholder="Senha">
        <br>
        <input type="submit" name="ongentrar" id="entrar" value="Entrar">
        
        <div class ="d-flex">
            <a href="/conexao/forms_cd/cadastroong.php" type="button" class="btn"> Cadastre de ONG Aqui!</a>
        </div>

        </form> 
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
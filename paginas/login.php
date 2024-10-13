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
    <link rel="stylesheet" type="text/css" href="css/estilologin.css">
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
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
            <a href="/conexao/forms_cd/cadastroong.php" type="button" class="btn"> Cadastre de ONG Aqui!</a>
        </div>

        </form> 
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
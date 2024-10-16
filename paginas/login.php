<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
} else {
    $logado = true;
    $id = $_SESSION['id'];  // Nome do usuário
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
                
                <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá, <?php 
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
                <p> ou </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        
        <?php endif; ?>
          <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include('conexao.php');
        $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO ='$id'";
        $result2= mysqli_query($mysqli, $sql2);
        $img_perfil = mysqli_fetch_assoc($result2);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='perfil/perfilusuario.php'><img class='pessoa' src='perfil/imagens_perfil/$img_perfil[IMG_PERFIL]'>";}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
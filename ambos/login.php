

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/cepet/ambos/css/logins.css">
    <link rel="stylesheet" type="text/css" href="/cepet/usuario/css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>

<header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div></header>
    <nav>
    <ul class="barra-navegacao">
        <li><a href="/cepet/usuario/adocao.php">Adoção</a></li>
        <li><a href="/cepet/usuario/ongs.php">ONGs</a></li>
        <li><a href="/cepet/usuario/doacao.php">Doação</a></li>
        <li><a href="/cepet/usuario/consulta.php">Consulta</a></li>
        <li><a href="/cepet/usuario/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>

    <form action="/cepet/usuario/config/inicia_login.php" method="POST">


    <div class="container">

    <!-- Primeira div para selecionar o tipo de login -->
    <div class="divtipodelogin show">
        <h1>Fazer Login Como:</h1>
        <p class="opcao-login" data-login="amigodosanimais">Amigo dos animais</p>
        <p class="opcao-login" data-login="ong">ONG</p>
        <p class="opcao-login" data-login="vet">Veterinário</p>
    </div>


    <!-- Div para login do Amigo dos Animais -->
    <div class="amigodosanimais">
        <h1>Login Usuário</h1>
        <input type="email" name="email" id="email" name="email" placeholder="Email">
        <input type="password" name="senha" id="senha" name="senha" placeholder="Senha">
        <input type="submit" id="entrar" name="usuarioentrar" value="Entrar"><br>
        <style> a:link{text-decoration: none;}</style>
        <a href="/cepet/cadastro/cadastrousuario.php"><p>Não tem cadastro? Crie sua conta Aqui! </p></a><br>
        <a href="/cepet/usuario/esquecersenha.php">Esqueceu sua senha?</p>

</form>
<form action="/cepet/ong/config/inicia_login.php" method="POST">

    </div>
 

    <!-- Div para login da ONG -->
    <div class="ong">
        <h1>Login ONG</h1>
        <input type="text" name="ongcnpj" id="ongcnpj" placeholder="CNPJ">
        <input type="password" name="ongsenha" id="ongsenha" placeholder="Senha">
        <input type="submit" id="entrar" name="ongentrar" value="Entrar">
        <style> a:link{text-decoration: none;}</style>
        <a href="/cepet/cadastro/cadastroong.php"><p>Cadastre sua ONG aqui! </p></a>
</form>
<form action="/cepet/veterinario/config/inicia_login.php" method="POST">

    </div>

    <!-- Div para login do Veterinário -->
    <div class="vet">
        <h1>Login Veterinário</h1>
        <input type="text" name="email" id="vetcnpj" placeholder="email">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" name="entrar" id="entrar" value="Entrar">
        <br> 
        <style> a:link{text-decoration: none;}</style>
        <a href="/cepet/cadastro/cadastrovet.php"><p>Não tem cadastro? Crie sua conta Aqui! </p></a>
</form>
    </div>
</div>
    <?php include ("C:/xampp/htdocs/cepet/usuario/padrao/footer.php") ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // Selecionar elementos
    const tipoLoginDiv = document.querySelector(".divtipodelogin");
    const amigoDiv = document.querySelector(".amigodosanimais");
    const ongDiv = document.querySelector(".ong");
    const vetDiv = document.querySelector(".vet");
    const titulo = tipoLoginDiv.querySelector("h1");
    const opcoesLogin = tipoLoginDiv.querySelectorAll("p");

    // Mostrar a primeira div ao carregar a página
    tipoLoginDiv.classList.add("show");

    // Função para alternar a exibição das divs
    function exibirDiv(div) {
        // Adicionar transição ao título
        tipoLoginDiv.classList.add("transitioned");

        // Ocultar a div de opções e exibir a nova div
        setTimeout(() => {
            tipoLoginDiv.classList.remove("show");
            div.classList.add("show");
        }, 300);
    }

    // Adicionar eventos de clique para cada opção de login
    opcoesLogin.forEach((opcao, index) => {
        opcao.addEventListener("click", function () {
            if (index === 0) exibirDiv(amigoDiv); // Amigo dos animais
            else if (index === 1) exibirDiv(ongDiv); // ONG
            else if (index === 2) exibirDiv(vetDiv); // Veterinário
        });
    });
});

    </script>
</body>
</html>
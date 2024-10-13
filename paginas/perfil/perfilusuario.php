<?php include('verifica_login.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="estiloperfil.css"> 
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <link rel="icon" href="/conexao/paginas/img/logos/icon.ico">  
</head>
<body>

<header>
        <div class="logoimg">
            <a href="/conexao/paginas/inicial.php"><img src="/conexao/paginas/img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logged_in): ?>
                <?php if ($user_type == 'ong'): ?>
                    <h2><?php echo $ong_name; ?></h2>
                <?php elseif ($user_type == 'usuario'): ?>
                    <h2><?php echo $user_name; ?></h2>
                <?php endif; ?>
                <a href="/conexao/configuracao/sair.php"><button class="link_sairbt">Sair</button></a>
            <?php else: ?>
                <a href="login.php">Faça o login</a>
                <p> ou </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            <?php endif; ?>
        </div>
        <img class="pessoa" src="/conexao/paginas/img/icones variados/perfil.png" alt="Ícone de perfil">
    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
    
    <main>
        <div class="profile-container">
            <h1>Perfil de <span id="nome_usuario">NOME_DE_USUARIO</span></h1>
            <div class="profile-info">
                <div class="profile-picture">
                    <img src="/conexao/paginas/img/animais/gato.jpg" alt="Foto do Usuário">
                </div>
                <div class="info-details">
                    <h2>Dados Pessoais</h2>
                    <p><strong>Nome Completo:</strong> <span id="nome_completo">NOME_COMPLETO</span></p>
                    <p><strong>Data de Nascimento:</strong> <span id="data_nascimento">DATA_DE_NASCIMENTO</span></p>
                    <p><strong>Gênero:</strong> <span id="genero">GENÊRO</span></p>
                    <p><strong>Email:</strong> <span id="email">EMAIL</span></p>
                    <p><strong>Telefone:</strong> <span id="telefone">TELEFONE</span></p>
                </div>
            </div>
            <div class="address-info">
                <h2>Endereço</h2>
                <p><strong>Endereço:</strong> <span id="endereco">ENDERECO</span></p>
                <p><strong>CEP:</strong> <span id="cep">CEP</span></p>
                <p><strong>UF:</strong> <span id="uf">UF</span></p>
            </div>
        </div>
    </main>

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
    <!-- Restante do código -->
    
</body>
</html>


<?php include('verifica_usuario.php'); 

if(isset($_POST['alterar']))
{
if(isset($_FILES['foto']))
{
 $arquivoF = $_FILES ['foto'];

 if($arquivoF['error'])
    die("Falha ao enviar arquivo");

 if($arquivoF['size'] > 10485760)
    die("Arquivo muito grande! Max: 10MB");

    $pasta= "imagens_de_perfil/";
    $nomeDoArquivo = $arquivoF['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    

    if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg")
        die("Tipo de arquivo inválido");

    $path = $novoNomeDoArquivo .".". $extensao;
    $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $pasta . $path);

}

}

?>

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
            <?php if ($logado): ?>
                <span class="user-name">Olá, <?php echo $usuario; ?> !</span>
                <a href="/conexao/configuracao/sair.php"><button class="link_sairbt">Sair</button></a>
            <?php else: ?>
                <a href="login.php">Faça o login</a>
                <p> ou </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            <?php endif; ?>
        </div>
        
       
        <img class="pessoa" src=" <?php echo"<img src='imagens_de_perfil/$path'>"; ?>">
        
        
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
            <h1><span id="nome_usuario"><?php echo $usuario; ?></span></h1>
            <div class="profile-info">
                <div class="profile-picture">
                    <!----------------------------------------foto de perfil-------------------------------->
                    <?php echo"<img src='imagens_de_perfil/$path'>"; ?>
                           
                    <!--------------------------------------------------------------------------------------->


                    <p>Foto</p>
              <div>      

            <form action="perfilusuario.php" method="POST" enctype="multipart/form-data">
             <!---------------------------------Input para trocar a foto--------------------->  
            <input type="file" name="foto"></input>
            <button type="submit" name="alterar" id="alterar">Alterar</button>
            <!---------------------------------Input para trocar a foto--------------------->  
            </form>
            <br>
            </div>  
                </div>
                <div class="info-details">
                    <h2>Dados Pessoais</h2>
                    <p><strong>Nome Completo:</strong> <span id="nome_completo"><?php echo $nome ?> </span></p>
                    <p><strong>Data de Nascimento:</strong> <span id="data_nascimento"><?php echo $data_nasc ?> </span></p>
                    <p><strong>Gênero:</strong> <span id="genero"><?php echo $genero ?> </span></p>
                    <p><strong>Email:</strong> <span id="email"><?php echo $email ?> </span></p>
                    <p><strong>Telefone:</strong> <span id="telefone"><?php echo $telefone ?> </span></p>
                </div>
            </div>
            <div class="address-info">
                <h2>Endereço</h2>
                <p><strong>Endereço:</strong> <span id="endereco"><?php echo $endereco ?> </span></p>
                <p><strong>CEP:</strong> <span id="cep"><?php echo $cep ?> </span></p>
                <p><strong>UF:</strong> <span id="uf"><?php echo $uf ?> </span></p>
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
    
</body>
</html>


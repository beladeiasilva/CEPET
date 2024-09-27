<?php
session_start();

    if((!isset($_SESSION['ongcnpj']) == true)and(!isset($_SESSION['ongsenha'])==true))
    {
        unset($_SESSION['ongcnpj']);
        unset($_SESSION['ongsenha']);

        header("Location: login.php");

       
    
    }
    
    
    
        
    
      
        
     

        
    

   
    
    
?>    
<!-----------------------------------HTML DO FORMULÁRIO------------------------------------------------------>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
    <script src="jscript/main.js" defer></script>
</head>
<body>
    

<div class ="d-flex">
    <a href="/conexao/configuracao/sair.php" type="button" class="btn">Sair</a>
   
</div>

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
            <a href="/conexao/forms_cd/cadastropet.php" type="button" class="btn">Cadastrar PET</a>
        </ul>
    </header>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <div class="banner" id="banner">
        <div><img src="img/teste/1.jpeg" /></div>
        <div><img src="img/teste/2.jpeg" /></div>
        <div><img src="img/teste/3.jpeg" /></div>
        <div><img src="img/teste/4.jpeg" /></div>
        <div><img src="img/teste/5.jpeg" /></div>
    </div>

<!CONHEÇA AS ONGs>
    <div>
        <p>Conheça as ONGs</p>
    </div>
        <div class="carrosel-ONG">
            <a href=""><img src="img/foto ongs/ong-das-patinhas.jpg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/patinhas-que-brilham.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/sempre-ao-seu-lado.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/cidadania-animal.png" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/gavaa.jpeg" class="imagem-arredondada"></a>
            <a href=""><img src="img/foto ongs/vira-lata-e-dez.jpeg" class="imagem-arredondada"></a>
        </div>

</body>
</html>
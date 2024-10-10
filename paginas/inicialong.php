<?php
session_start();

    if((!isset($_SESSION['cnpj']) == true)and(!isset($_SESSION['senha'])==true))
    {
        unset($_SESSION['cnpj']);
        unset($_SESSION['senha']);
        unset($_SESSION['ong']);

        header("Location: login.php");
    }
    else{

    

        echo '<h2>',$_SESSION['ong'],'</h2>';

        echo "<button class = 'link_sair'>
        <a class='link_sair' href='/conexao/configuracao/sair.php'><h4> Sair </h4>
        </a>
        </button>";


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
    <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
</head>
<body>

<div class ="d-flex">
    
</div>

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
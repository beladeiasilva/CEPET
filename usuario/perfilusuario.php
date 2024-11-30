<?php 

// Verifica se o usuário está logado
include("config/logado.php");

include("config/perfilusuario/info_perfil.php");


 //------------------------------------------------------------------------------------------------------------------------------------//
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="css/estiloperfil.css"> 
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
</head>
<body>



<header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>

                <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá, <?php 
                include("config/conexao.php");  $sql ="SELECT NOME_DE_USUARIO FROM usuarios WHERE ID_USUARIO = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $nomeU = mysqli_fetch_assoc($result);
                $nomeU['NOME_DE_USUARIO'];
                echo $nomeU['NOME_DE_USUARIO']; ?> !</span>
                <!------------------------------------------------------------------------------------------------------->

                <a href="config/sair.php"><button class="link_sairbt">Sair</button></a>
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login</a>
                <p>/</p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            <?php endif; ?>
        </div>
        <!--------------------------------FOTO DE PERFIL ICONE------------------------------------------->
        <?php  
        include("config/conexao.php");
        $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id' ";
        $result2= mysqli_query($mysqli, $sql2);
        $img_perfil = mysqli_fetch_assoc($result2);
        $img_perfil['IMG_PERFIL'];
        echo"<img class='pessoa' src='img/imagens_perfil/$img_perfil[IMG_PERFIL]'>";
        ?>
        <!----------------------------------------------------------------------------------------------->

    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="adocao.php">Adoção</a></li>
        <li><a href="ONGs.php">ONGs</a></li>
        <li><a href="doacao.php">Doação</a></li>
        <li><a href="Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
    
    <main>
        <div class="profile-container">
            <h1><span id="nome_usuario"><?php echo $nomeU['NOME_DE_USUARIO']; ?></span></h1>
            <div class="profile-info">
                <div class="profile-picture">
                    <!----------------------------------------foto de perfil-------------------------------->
                    <?php
                        include("config/conexao.php");
                        $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id'";
                        $result2= mysqli_query($mysqli, $sql2);

                       $img_perfil = mysqli_fetch_assoc($result2);
                       
                         echo"<img src='img/imagens_perfil/$img_perfil[IMG_PERFIL]';";
                     
                    ?>
                    <!--------------------------------------------------------------------------------------->    
                    <p>Foto</p>
              <div>      

           
             <!---------------------------------Input para trocar a foto--------------------->  
             <?php   
              echo $link_editar;
             ?>
            <!---------------------------------Input para trocar a foto--------------------->  
            
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
                <p><strong>Endereço:</strong> <span id="endereco"><?php echo $cidade ,"/", $bairro,"/", $rua,"/", $numero; ?> </span></p>
                <p><strong>CEP:</strong> <span id="cep"><?php echo $cep ?> </span></p>
                <p><strong>UF:</strong> <span id="uf"><?php echo $uf ?> </span></p>
            </div>
        </div>
    </main>

    <button id="excluircontausuario"> Deletar Conta</button>

    <?php include 'padrao/footer.php'; ?>
    
</body>
</html>


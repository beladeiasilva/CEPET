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
    <link rel="stylesheet" type="text/css" href="css/estiloadocao.css">
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoção</title>
    <link rel="icon" href="img/logos/icon.ico"> 
    <script src="jscript/adocao.js" defer></script>
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

    <div class="container">
        <!-- Sidebar de Filtros -->
        <div class="sidebar">
            <h3>Filtros</h3>
            
            <p>Animal</p>
            <select name="tipoanimal" id="tipoanimal">
                <option value="">Selecione o tipo de animal</option>
                <option value="gato">Gato</option>
                <option value="cachorro">Cachorro</option>
            </select>
            <p>Estado</p>
            <select name="estado" id="estado">
                <option value="">Selecione o estado</option>
            </select>

            <p>Cidade</p>
            <select name="cidade" id="cidade">
                <option value="">Selecione a cidade</option>
            </select>

            <p>Gênero</p>
            <select name="generoanimal" id="generoanimal">
                <option value="">Selecione o gênero</option>    
                <option value="Macho">Macho</option>    
                <option value="Fêmea">Fêmea</option>
            </select>

            <p>Idade</p>
            <input type="number" name="idade" id="idade" max="25" placeholder="Digite a idade">

            <p>ONGs</p>
            <select name="ongs" id="ongs">
                <option value="">Selecione uma ONG</option>
                <option value="ong1">ONG 1</option>
                <option value="ong2">ONG 2</option>
                <!-- Adicione as ONGs conforme necessário -->
            </select>

            <p id="pCachorroRaca">Raça Cachorro</p>
            <select name="cachorroraca" id="cachorroRaca">
                <option value="">Selecione a raça do cachorro</option>
                <option value="labrador">Labrador</option>
                <option value="beagle">Beagle</option>
            </select>

            <p id="pGatoRaca">Raça Gato</p>
            <select name="gatoraca" id="gatoRaca">
                <option value="">Selecione a raça do gato</option>
                <option value="persa">Persa</option>
                <option value="siames">Siamês</option>
            </select>

            <p>Porte</p>
            <select name="porte" id="porte">
                <option value="">Selecione o porte</option>
                <option value="pequeno">Pequeno</option>
                <option value="medio">Médio</option>
                <option value="grande">Grande</option>
            </select>

            <p id="pCachorroCor">Cor Cachorro</p>
            <select name="cachorrocor" id="cachorrocor">
                <option value="">Selecione a cor do cachorro</option>
                <option value="preto">Preto</option>
                <option value="marrom">Marrom</option>
            </select>

            <p id="pGatoCor">Cor Gato</p>
            <select name="gatocor" id="gatocor">
                <option value="">Selecione a cor do gato</option>
                <option value="branco">Branco</option>
                <option value="cinza">Cinza</option>
            </select>
            <br>
            <button onclick="filtrar()">Filtrar</button>
        </div>
>

        <!-- Grid de Animais -->


                <!------------------==============================PET(1)=================================---------------------------->

        <div class="animal-grid" id="animal-grid">
            <div class="animal-card" data-tipo="cachorro" data-genero="Macho" data-nome="Fred" data-idade="3" data-raca="labrador" data-porte="medio" data-cor="marrom">
                <!---------------------------------IMAGEM DO PET (1)-------------------------------------------------------->
                 <?php
                    include('conexao.php');
                    $sql1= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 1";
                    $result1 = mysqli_query($mysqli, $sql1);
                    $foto = mysqli_fetch_assoc($result1);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <img src='/conexao/forms_cd/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' >";}
                    else{echo" Não há nenhum pet cadastrado.";}
                        
                    ?>
                <!------------------------------------NOME DO PET (1)------------------------------------------------------->
                <h4><?php 
                    include ("conexao.php");
                    $sql2= "SELECT NOME FROM pets WHERE ID_PET = 1";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $desc1 = mysqli_fetch_assoc($result2);
                    if(isset($desc1['NOME'])) {
                    $desc1['NOME'];
                    print_r($desc1['NOME']);}
                    else{echo"";}
                ?></h4>
                <!------------------------------------IDADE DO PET (1)------------------------------------------------------->
                    <p> <?php 
                    include ("conexao.php");
                    $sql3= "SELECT IDADE FROM pets WHERE ID_PET = 1";
                    $result3 = mysqli_query($mysqli, $sql3);
                    $desc2 = mysqli_fetch_assoc($result3);
                    if(isset($desc2['IDADE'])) {
                    $desc2['IDADE'];
                    echo"$desc2[IDADE]";}
                     else{echo"";}
                    ?></p>
            </div>

        <!------------------==============================PET(2)=================================---------------------------->

            <div class="animal-card" data-tipo="gato" data-genero="Fêmea" data-nome="Luna" data-idade="2" data-raca="persa" data-porte="pequeno" data-cor="branco">
                 <!---------------------------------IMAGEM DO PET (2)-------------------------------------------------------->
                    <?php
                    include('conexao.php');
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 2";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <img src='/conexao/forms_cd/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' >";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    
                        
                    
                    ?>
                <!------------------------------------NOME DO PET (2)------------------------------------------------------->
                    <h4><?php 
                    include ("conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 2";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    
                   
                    
                       
                   
                    
                    ?></h4>
                <!------------------------------------IDADE DO PET (2)------------------------------------------------------->
                    <p> <?php 
                    include ("conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 2";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                   
                    ?></p>

        <!------------------==============================PET(3)=================================---------------------------->
        </div>
            <div class="animal-card" data-tipo="cachorro" data-genero="Fêmea" data-nome="Bella" data-idade="5" data-raca="beagle" data-porte="medio" data-cor="preto">
                 <!---------------------------------IMAGEM DO PET (3)-------------------------------------------------------->
                 <?php
                    include('conexao.php');
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 3";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <img src='/conexao/forms_cd/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' >";}
                    else{echo" Não há nenhum pet cadastrado.";}
                        
                    
                    ?>
                <!------------------------------------NOME DO PET (3)------------------------------------------------------->
                    <h4><?php 
                    include ("conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 3";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                        
                    ?></h4>
               <!------------------------------------IDADE DO PET (3)------------------------------------------------------->
               <p> <?php 
                    include ("conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 3";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>

        <!------------------==============================PET(4)=================================---------------------------->
            <div class="animal-card" data-tipo="gato" data-genero="Macho" data-nome="Tom" data-idade="4" data-raca="siames" data-porte="pequeno" data-cor="cinza">
                <!---------------------------------IMAGEM DO PET (4)-------------------------------------------------------->

                <?php
                    include('conexao.php');
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 4";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <img src='/conexao/forms_cd/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' >";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    ?>
      
                <!------------------------------------NOME DO PET (4)------------------------------------------------------->
                <h4><?php 
                    include ("conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 4";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    ?></h4>
                <!------------------------------------IDADE DO PET (4)------------------------------------------------------->
               <p> <?php 
                    include ("conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 4";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>
            
        <!------------------==============================PET(5)=================================---------------------------->
        <div class="animal-card" data-tipo="cachorro" data-genero="Macho" data-nome="Max" data-idade="7" data-raca="golden" data-porte="grande" data-cor="marrom">
                <!---------------------------------IMAGEM DO PET (5)-------------------------------------------------------->

                <?php
                        include('conexao.php');
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 5";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <img src='/conexao/forms_cd/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' >";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    ?>
               
                <!------------------------------------NOME DO PET (5)------------------------------------------------------->
                <h4><?php 
                    include ("conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 5";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    ?></h4>
                <!------------------------------------IDADE DO PET (5)------------------------------------------------------->
               <p> <?php 
                    include ("conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 5";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>
            
            <div class="animal-card" data-tipo="gato" data-genero="Fêmea" data-nome="Mimi" data-idade="1" data-raca="angora" data-porte="pequeno" data-cor="branco">
                <img src="" alt="">
                <h4></h4>
                <p></p>
            </div>
            
            <div class="animal-card" data-tipo="cachorro" data-genero="Fêmea" data-nome="Daisy" data-idade="3" data-raca="poodle" data-porte="pequeno" data-cor="branco">
                <img src="" alt="">
                <h4></h4>
                <p></p>
            </div>
            
            <div class="animal-card" data-tipo="gato" data-genero="Macho" data-nome="Simba" data-idade="2" data-raca="bengal" data-porte="medio" data-cor="marrom">
                <img src="img/animais/cat (3).png" alt="">
                <h4></h4>
                <p></p>
            </div>
            <div class="animal-card" >
                <img src="" alt="">
                <h4> </h4>
                <p> </p>
            </div>        
        </div>
    </div>
    
</body>
</html>
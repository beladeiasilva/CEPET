<?php
require 'C:/xampp/htdocs/cepet/ong/config/logado.php';

?>

<!-----------------------------------------HTML DO FORMULÁRIO---------------------------------------------------->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Cadastro Pet</title>
    <link rel="stylesheet" href="css/estilocadastro.css"> 
    <link rel="stylesheet" type="text/css" href="/cepet/usuario/css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
<header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado == true): ?>

                <h2><span class="user-name"><?php 
                include("config/conexao.php");  $sql ="SELECT NOME FROM ongs WHERE cnpj = '$cnpj'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME'];
                echo $nome['NOME']; ?></span></h2>

                <a href="/cepet/ong/config/sair.php"><button class="link_sair">Sair</button></a>
            <?php else: ?>
                <a href="login.php">Faça o login </a>
                <p> ou </p>
                <a href="/cepet/usuario/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>
    </header>


    <nav>
    <ul class="barra-navegacao">
        <li><a href="/cepet/usuario/adocao.php">Adoção</a></li>
        <li><a href="/cepet/usuario/ONGs.php">ONGs</a></li>
        <li><a href="/cepet/usuario/doacao.php">Doação</a></li>
        <li><a href="/cepet/usuario/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
    

    <div class="container">
<!--- Método "POST" Essencial para a conexão dos dados ------------>
<form action ="config/cadastra_pet.php" method = "POST" enctype="multipart/form-data">

<!----------------------------------------------------------------->


 <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->
<h1>Cadastro do Pet</h1>

<p>Animal</p>
<select name ="tipoanimal" id="tipoanimal">
    <option value="">Selecione o tipo de animal</option>
    <option value="gato">Gato</option>
    <option value="cachorro">Cachorro</option>
</select>

<p>Gênero</p>
<select type="text" name="generoanimal" id="Generoanimal">
    <option value="">Selecione o gênero</option>    
    <option value="Macho">Macho</option>    
    <option value="Fêmea">Fêmea</option>
</select>

<p>Nome</p>
<input type="text" name="nome" id="inputnome" placeholder="Digite o nome do pet">

<p>Idade</p>
<input type="text" name="idade" max="25"  placeholder="Digite a idade">

<p id="pCachorroRaca">Raça Cachorro</p>
<select type="text" name ="cachorroraca" id="cachorroRaca">
    <option value="">Selecione a raça do cachorro</option>
    <option value="viralata">Vira-Lata</option>
    <option value="labrador">Labrador Retriever</option>
    <option value="golden-retriever">Golden Retriever</option>
    <option value="bulldog-ingles">Bulldog Inglês</option>
    <option value="poodle">Poodle</option>
    <option value="pastor-alemao">Pastor Alemão</option>
    <option value="beagle">Beagle</option>
    <option value="rottweiler">Rottweiler</option>
    <option value="chihuahua">Chihuahua</option>
    <option value="dachshund">Dachshund</option>
    <option value="shihtzu">Shih Tzu</option>
    <option value="boxer">Boxer</option>
    <option value="pug">Pug</option>
    <option value="husky-siberiano">Husky Siberiano</option>
    <option value="border-collie">Border Collie</option>
    <option value="yorkshire">Yorkshire Terrier</option>
    <option value="pitbull">Pit Bull</option>
    <option value="weimaraner">Weimaraner</option>
    <option value="outro">Outro</option>
</select>

<p id="pGatoRaca">Raça Gato</p>
<select type="text" name="gatoraca" id="gatoRaca">
    <option value="">Selecione a raça do gato</option>
    <option value="persa">Persa</option>
    <option value="siames">Siamês</option>
    <option value="maine-coon">Maine Coon</option>
    <option value="bengal">Bengal</option>
    <option value="sphynx">Sphynx</option>
    <option value="british-shorthair">British Shorthair</option>
    <option value="ragdoll">Ragdoll</option>
    <option value="angora">Angorá</option>
    <option value="scottish-fold">Scottish Fold</option>
    <option value="burmes">Burmês</option>
    <option value="chartreux">Chartreux</option>
    <option value="exotic-shorthair">Exotic Shorthair</option>
    <option value="russian-blue">Russian Blue</option>
    <option value="outro">Outro</option>
</select>

<p>Porte</p>
<select type="text" name="porte" id="porte">
    <option value="">Selecione o porte</option>
    <option value="pequeno">Pequeno</option>
    <option value="medio">Médio</option>
    <option value="grande">Grande</option>
</select>

<p id="pCachorroCor">Cor Cachorro</p>
<select type="text" name="cachorrocor" id="cachorrocor">
    <option value="">Selecione a cor do cachorro</option>
    <option value="preto">Preto</option>
    <option value="branco">Branco</option>
    <option value="marrom">Marrom</option>
    <option value="dourado">Dourado</option>
    <option value="tigrado">Tigrado</option>
    <option value="cinza">Cinza</option>
    <option value="creme">Creme</option>
    <option value="tricolor">Tricolor</option>
</select>

<p id="pGatoCor">Cor Gato</p>
<select type="text" name="gatocor" id="gatocor">
    <option value="">Selecione a cor do gato</option>
    <option value="preto">Preto</option>
    <option value="branco">Branco</option>
    <option value="cinza">Cinza</option>
    <option value="tigrado">Tigrado</option>
    <option value="tricolor">Tricolor</option>
    <option value="siames">Siamês</option>
    <option value="laranja">Laranja</option>
    <option value="creme">Creme</option>
    <option value="chocolate">Chocolate</option>
</select>



<p>Histórico</p>
<input type="text" name="historico" id="inputhistorico" placeholder="Digite o histórico do pet">


<p>Foto</p>
<input type="file" name="foto">
<br>
<button name="enviarpet" id="enviarcadastropet">Enviar</button>
</form></div>


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
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/twitter.png" alt="Twitter"></a>
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
<script>
document.getElementById('tipoanimal').addEventListener('change', function () {
    var tipoAnimal = this.value;
    
    // Parágrafos e selects para cachorro
    var pCachorroRaca = document.getElementById('pCachorroRaca');
    var cachorroRaca = document.getElementById('cachorroRaca');
    var pCachorroCor = document.getElementById('pCachorroCor');
    var cachorroCor = document.getElementById('cachorrocor');
    
    // Parágrafos e selects para gato
    var pGatoRaca = document.getElementById('pGatoRaca');
    var gatoRaca = document.getElementById('gatoRaca');
    var pGatoCor = document.getElementById('pGatoCor');
    var gatoCor = document.getElementById('gatocor');
    
    // Esconder todos os campos e parágrafos inicialmente
    pCachorroRaca.style.display = 'none';
    cachorroRaca.style.display = 'none';
    pCachorroCor.style.display = 'none';
    cachorroCor.style.display = 'none';
    
    pGatoRaca.style.display = 'none';
    gatoRaca.style.display = 'none';
    pGatoCor.style.display = 'none';
    gatoCor.style.display = 'none';
    
    // Exibir os campos e parágrafos de acordo com o animal selecionado
    if (tipoAnimal === 'cachorro') {
        pCachorroRaca.style.display = 'block';  // Alterado para flex
        cachorroRaca.style.display = 'flex';   // Alterado para flex
        pCachorroCor.style.display = 'block';   // Alterado para flex
        cachorroCor.style.display = 'flex';    // Alterado para flex
    } else if (tipoAnimal === 'gato') {
        pGatoRaca.style.display = 'block';      // Alterado para flex
        gatoRaca.style.display = 'flex';       // Alterado para flex
        pGatoCor.style.display = 'block';       // Alterado para flex
        gatoCor.style.display = 'flex';        // Alterado para flex
    }
});
</script>
</body>
</html>
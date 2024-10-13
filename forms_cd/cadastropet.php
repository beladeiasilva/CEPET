<?php
SESSION_START();


//==========Puxando CNPJ para inserir na chave estrangeira-----//
if((isset($_SESSION['cnpj']) == true)and(isset($_SESSION['senha'])==true))
{
 $ongcnpj = $_SESSION['cnpj'];
}
else
//==========Impedindo o usuário acessar este FORM ou qualquer ONG não cadastrada!====//
{
        header('Location: /conexao/paginas/login.php');
} 
//===================================================================================//

if(isset($_POST['enviarpet']))
{
//Teste para ver as informações inseridas.
//if(isset($_POST['enviar']))
//{
    //print_r($_POST['tipoanimal']);
    //print_r($_POST['generoanimal']);
    //print_r($_POST['nome']);
    //print_r($_POST['idade']);
    //print_r($_POST['cachorroraca']);
    //print_r($_POST['gatoraca']);
    //print_r($_POST['porte']);
    //print_r($_POST['cachorrocor']);
    //print_r($_POST['gatocor']);
    //print_r($_POST['historico']);
    //print_r($_POST['foto']);
//}
include('conexao.php');

//------------------------Declaração das váriaveis------------------//

$tipoanimal = $_POST['tipoanimal'];
$generoanimal = $_POST['generoanimal'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cachorroraca = $_POST['cachorroraca'];
$gatoraca = $_POST['gatoraca'];
$porte = $_POST['porte'];
$cachorrocor = $_POST['cachorrocor'];
$gatocor = $_POST['gatocor'];
$historico = $_POST['historico'];
$ongcnpj = $_SESSION['cnpj'];


//------------------------Estrutura da foto dos pets-----------------//

if(isset($_FILES['foto']))
{
 $arquivoF = $_FILES ['foto'];

 if($arquivoF['error'])
    die("Falha ao enviar arquivo");

 if($arquivoF['size'] > 10485760)
    die("Arquivo muito grande! Max: 10MB");

    $pasta= "imagens_pets_cadastrados/";
    $nomeDoArquivo = $arquivoF['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    

    if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg")
        die("Tipo de arquivo inválido");

    $path = $pasta . $novoNomeDoArquivo .".". $extensao;
    $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);

    //-------------------------------Inserindo ao banco de dados-----------------------//
    
$result = mysqli_query($mysqli, "INSERT INTO pets (NOME, TIPO, COR, GENERO, PORTE, RAÇA, IDADE, HISTÓRICO, LINK_FOTO, FK_ONG_CNPJ)
VALUES ('$nome','$tipoanimal','$cachorrocor $gatocor','$generoanimal','$porte','$cachorroraca $gatoraca','$idade','$historico','$novoNomeDoArquivo.$extensao','$ongcnpj')");






 header('Location: /conexao/paginas/login.php');

 

}
}
if((!isset($_SESSION['cnpj']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);
    unset($_SESSION['ong']);
    // Usuário não está logado, exibe os links de login e cadastro
    $logged_in = false;
} else {
    // Usuário está logado, exibe o nome e o botão de sair
    $logged_in = true;
    $ong_name = $_SESSION['ong'];
}
?>

<!-----------------------------------------HTML DO FORMULÁRIO---------------------------------------------------->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Cadastro Pet</title>
    <link rel="stylesheet" href="estilocadastro.css"> 
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
<header>
        <div class="logoimg">
            <a href="/conexao/paginas/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logged_in): ?>
                <h2><?php echo $ong_name; ?></h2>
                <a href="/conexao/configuracao/sair.php"><button class="link_sair">Sair</button></a>
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
<!--- Método "POST" Essencial para a conexão dos dados ------------>
<form action ="cadastropet.php" method = "POST" enctype="multipart/form-data">

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
    <!-- opções de raças de cachorro -->
</select>

<p id="pGatoRaca">Raça Gato</p>
<select type="text" name="gatoraca" id="gatoRaca">
    <option value="">Selecione a raça do gato</option>
    <!-- opções de raças de gato -->
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
    <!-- opções de cores de cachorro -->
</select>

<p id="pGatoCor">Cor Gato</p>
<select type="text" name="gatocor" id="gatocor">
    <option value="">Selecione a cor do gato</option>
    <!-- opções de cores de gato -->
</select>



<p>Histórico</p>
<input type="text" name="historico" id="inputhistorico" placeholder="Digite o histórico do pet">


<p>Foto</p>
<input type="file" name="foto">
<br>
<button name="enviarpet" id="enviarcadastropet">Enviar</button>
</form></div>

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
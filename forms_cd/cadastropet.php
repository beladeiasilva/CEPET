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

    $path = $pasta . $novoNomeDoArquivo . "." .  $extensao;
    $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);


    //-------------------------------Inserindo ao banco de dados-----------------------//
    
$result = mysqli_query($mysqli, "INSERT INTO pets (NOME, TIPO, COR, GENERO, PORTE, RAÇA, IDADE, HISTÓRICO, LINK_FOTO, FK_ONG_CNPJ)
VALUES ('$nome','$tipoanimal','$cachorrocor $gatocor','$generoanimal','$porte','$cachorroraca $gatoraca','$idade','$historico','$path','$ongcnpj')");






header('Location: /conexao/paginas/login.php');

}
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
    <div>


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

<button name="enviarpet" id="enviarcadastropet">Enviar</button>

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
        pCachorroRaca.style.display = 'block';
        cachorroRaca.style.display = 'block';
        pCachorroCor.style.display = 'block';
        cachorroCor.style.display = 'block';
    } else if (tipoAnimal === 'gato') {
        pGatoRaca.style.display = 'block';
        gatoRaca.style.display = 'block';
        pGatoCor.style.display = 'block';
        gatoCor.style.display = 'block';
    }
});
</script>

</script>
</body>
</html>
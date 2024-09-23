<?php
if(isset($_POST['enviar']))
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
include_once('conexao.php');

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
$foto = $_POST['foto'];

$result = mysqli_query($mysqli, "INSERT INTO pets (NOME, TIPO, CÃO_COR, GATO_COR, GENERO, PORTE, CÃO_RAÇA, GATO_RAÇA, IDADE, HISTÓRICO, LINK_FOTO)
VALUES ('$nome','$tipoanimal','$cachorrocor','$gatocor','$generoanimal','$porte','$cachorroraca','$gatoraca','$idade','$historico','$foto')");

header("Location: login.php");
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
<form action ="cadastropet.php" method = "POST">
<!----------------------------------------------------------------->

<h1>Cadastro do Pet</h1>

<p>Animal</p>
<select id="tipoanimal">
    <option value="">Selecione o tipo de animal</option>
    <option value="gato">Gato</option>
    <option value="cachorro">Cachorro</option>
</select>

<p>Gênero</p>
<select id="Generoanimal">
    <option value="">Selecione o gênero</option>    
    <option value="Macho">Macho</option>    
    <option value="Fêmea">Fêmea</option>
</select>

<p>Nome</p>
<input type="text" id="inputnome" placeholder="Digite o nome do pet">

<p>Idade</p>
<input type="number" max="25" min="0" placeholder="Digite a idade">

<p id="pCachorroRaca">Raça Cachorro</p>
<select id="cachorroRaca">
    <option value="">Selecione a raça do cachorro</option>
    <!-- opções de raças de cachorro -->
</select>

<p id="pGatoRaca">Raça Gato</p>
<select id="gatoRaca">
    <option value="">Selecione a raça do gato</option>
    <!-- opções de raças de gato -->
</select>

<p>Porte</p>
<select id="porte">
    <option value="">Selecione o porte</option>
    <option value="pequeno">Pequeno</option>
    <option value="medio">Médio</option>
    <option value="grande">Grande</option>
</select>

<p id="pCachorroCor">Cor Cachorro</p>
<select id="cachorrocor">
    <option value="">Selecione a cor do cachorro</option>
    <!-- opções de cores de cachorro -->
</select>

<p id="pGatoCor">Cor Gato</p>
<select id="gatocor">
    <option value="">Selecione a cor do gato</option>
    <!-- opções de cores de gato -->
</select>

<p>Histórico</p>
<input type="text" id="inputhistorico" placeholder="Digite o histórico do pet">

<p>Foto</p>
<input type="file">

<button id="enviarcadastropet">Enviar</button>

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

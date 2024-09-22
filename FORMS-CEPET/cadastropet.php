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
</head>
<body>
    <div>
       <h1>Cadastro do Pet</h1>


<!--- Método "POST" Essencial para a conexão dos dados ------------>
<form action ="cadastropet.php" method = "POST">
<!----------------------------------------------------------------->



<p>Animal</p>
<select name="tipoanimal" id="tipoanimal">
    <option value="">Selecione o tipo de animal</option>
    <option value="gato">Gato</option>
    <option value="cachorro">Cachorro</option>
</select>

<p>Gênero</p>
<select name="generoanimal" id="Generoanimal">
    <option value="">Selecione o gênero</option>    
    <option value="Macho">Macho</option>    
    <option value="Fêmea">Fêmea</option>
</select>

<p>Nome</p>
<input type="text" name="nome" id="inputnome" placeholder="Digite o nome do pet">

<p>Idade</p>
<input type="number" name="idade" max="25" min="0" placeholder="Digite a idade">

<p>Raça (Cachorro)</p>
<select name="cachorroraca" id="cachorroRaca">
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

<p>Raça (Gato)</p>
<select name="gatoraca" id="gatoRaca">
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
<select name="porte" id="porte">
    <option value="">Selecione o porte</option>
    <option value="pequeno">Pequeno</option>
    <option value="medio">Médio</option>
    <option value="grande">Grande</option>
</select>

<p>Cor (Cachorro)</p>
<select name="cachorrocor" id="cachorrocor">
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

<p>Cor (Gato)</p>
<select name="gatocor" id="gatocor">
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
<input name="foto" type="file">

    <button type="submit" name="enviar" id="enviarcadastropet">Enviar</button>
    </form>
    </div>
</body>
</html>

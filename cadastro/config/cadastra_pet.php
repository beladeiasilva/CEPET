<?php
if(isset($_POST['enviarpet']))
{

include("config/conexao.php");

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

    $pasta= "img/imagens_pets_cadastrados/";
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






 header('Location: /cepet/usuario/login.php');

 

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
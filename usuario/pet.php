<?php
if(isset($_POST['adotar'])){

    //verifica se usuário esta logado//
    include("config/logado.php");
    
    if($logado==false){
    header('Location: /cepet/ambos/login.php');
    }
    }


include("config/conexao.php");
// Receber o ID do pet via GET
if(!empty($_GET['ID_PET'])){


$id_pet = $_GET['ID_PET'];


    // Buscar as informações do pet no banco de dados
    $sql = "SELECT p.NOME, p.RAÇA, p.IDADE, p.GENERO, p.PORTE, p.COR, p.HISTÓRICO, p.LINK_FOTO, o.NOME AS ONG_NOME, o.ESTADO 
            FROM pets p
            JOIN ongs o ON p.FK_ONG_CNPJ = o.CNPJ
            WHERE p.ID_PET = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_pet);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o pet foi encontrado
    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        echo "Pet não encontrado!";
        exit;
    }

    $stmt->close();
} else {
    echo "ID do pet não informado!";
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilopet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <title>Perfil do Pet</title>
    <link rel="icon" href="img/logos/icon.ico">
</head>
<body>

<header>
<div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
    <div class="logoimg">
    </div>
    <div class="headerlogin">
            
                 
                <!------------------------------------------------------------------------------------------------------->

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
<div class="container">
<div class="pet-card">
    <div class="header">
        
        <span class="ong-nome"><?php echo $pet['ONG_NOME']; ?></span>
        <span class="estado"><strong><?php echo $pet['ESTADO']; ?></strong></span>
    </div>
    <div class="pet-info">
        <img src="/cepet/cadastro/img/imagens_pets_cadastrados/<?php echo $pet['LINK_FOTO']; ?>" alt="Foto do Pet" class="pet-img">
        <div class="info">
            <h1><?php echo $pet['NOME']; ?></h1>
            <h2><?php echo $pet['RAÇA']; ?></h2>
            <ul>
                <li>Idade: <strong><?php echo $pet['IDADE']; ?></strong></li>
                <li>Porte: <strong><?php echo $pet['PORTE']; ?></strong></li>
                <li>Gênero: <strong><?php echo $pet['GENERO']; ?></strong></li>
                <li>Cor: <strong><?php echo $pet['COR']; ?></strong></li>
            </ul>

            <p><?php echo $pet['HISTÓRICO']; ?></p>
        </div>
        <div class="pet-paw"></div>
    </div>
</div></div>

<form action="pet.php" method="POST">
</main>
<?php $_GET['ID_PET'];
echo"<a name='adotar' href='adotar.php?ID_PET=$_GET[ID_PET]'>
    <button class='adotar-button' name='adotar'><strong>Adotar</strong></button>
</a>";?>
</form>

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
                <a href="#"><img src="img/redes sociais/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="img/redes sociais/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="img/redes sociais/twitter.png" alt="Twitter"></a>
            </div>
        </div>
        <div class="suggestion-section">
            <h3>Sugestões</h3>
            <p>Nos ajude a melhorar deixando sua sugestão:</p>
            <textarea placeholder="Digite sua sugestão de melhoria:"></textarea>
            <button>Enviar</button>
        </div>
    </div>
    <p>© 2024 Cepet - Todos os direitos reservados.</p>
</footer>

</body>
</html>

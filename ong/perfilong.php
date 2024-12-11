<?php


include("config/conexao.php");
include("config/logado.php");

// Consulta ao banco de dados
$sql = "SELECT * FROM ongs WHERE CNPJ = '$cnpj'";
$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
    $ong = $result->fetch_assoc();
} else {
    echo "ONG não encontrada.";
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $biografia = $_POST['biografia'];
    $foto = $_FILES['foto'];

       // Processo de upload de foto

    if($foto['size'] > 10485760)
    die("Arquivo muito grande! Max: 10MB");

    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($foto['name'],PATHINFO_EXTENSION));
    $fotoPath = 'C:/xampp/htdocs/cepet/ong/img/imagens_perfil/';

    if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg" && $extensao != ""){
        die("Tipo de arquivo inválido");

        if($extensao ==""){
            $sql="SELECT IMG_PERFIL_ONG FROM ONGS WHERE CNPJ = '$cnpj'";
            $result=mysqli_query($mysqli, $sql);
            $img_atual=mysqli_fetch_assoc($result);
            $img_atual['IMG_PERFIL_ONG'];

            $sqlUpdate2 = mysqli_query($mysqli, "UPDATE ongs SET  IMG_PERFIL_ONG='$img_atual[IMG_PERFIL_ONG]' WHERE CNPJ='$cnpj'");
        }
            if($biografia == ""){
             $sql="SELECT BIOGRAFIA FROM ONGS WHERE CNPJ ='$cnpj'";
             $result=mysqli_query($mysqli, $sql);
             $bioatual=mysqli_fetch_assoc($result);
           
             
             $sqlUpdate3= mysqli_query($mysqli, "UPDATE ongs SET BIOGRAFIA='$bioatual[BIOGRAFIA]' WHERE CNPJ='$cnpj'");
            }
        
        $path = $fotoPath . $novoNomeDoArquivo .".". $extensao;
        include("config/deletar_imagens.php");

        // Atualiza os dados da ONG no banco
         $sqlUpdate1=mysqli_query($mysqli, "UPDATE ongs SET BIOGRAFIA='$biografia', IMG_PERFIL_ONG='$novoNomeDoArquivo.$extensao' WHERE CNPJ='$cnpj'");

         $deu_certo = move_uploaded_file($foto['tmp_name'], $path);

     }
   
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estiloperfilong.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <title>Editar Perfil da ONG - <?php echo $ong['NOME']; ?></title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>

<?php include("padrao/header.php"); ?>

<nav>
    <ul class="barra-navegacao">
        <li>Pets</a></li>
        <li>ONGs</a></li>
        <li>Doação</a></li>
        <li>Notícias e dicas</a></li>
    </ul>
</nav>


<form action="" method="POST" enctype="multipart/form-data">

<div class="perfil-container">
    <h1>Editar Perfil de <?php echo $ong['NOME']; ?></h1>
        <div class="parte1">
            <label for="foto">Foto da ONG:</label>
            <div class="preview-container">
                                <!-------------IMAGEM PERFIL PRINCIPAL------------------>
            <?php echo"<img id='preview' src='img/imagens_perfil/$img_perfil[IMG_PERFIL_ONG]' alt='ong'>";?>
                                <!------------------------------------------------------>
            </div>
            <input type="file" name="foto" id="foto" onchange="previewImage(event)">

        <label for="biografia">Biografia:</label><BR>
            <textarea name="biografia" id="biografia"  rows="5" placeholder="escreva sobre sua ong..."><?php echo $ong['BIOGRAFIA']; ?></textarea>
            </div>
        <div>
            

    <p><strong>Endereço:</strong> <?php echo $ong['ENDERECO']; ?>, <?php echo $ong['CEP']; ?> - <?php echo $ong['ESTADO']; ?></p>
    <p><strong>Email:</strong> <?php echo $ong['EMAIL']; ?></p>
    <p><strong>Telefone:</strong> <?php echo $ong['TELEFONE']; ?></p>
    <?php if ($ong['SITE']) { ?>
        <p><strong>Site:</strong> <a href="<?php echo $ong['SITE']; ?>" target="_blank"><?php echo $ong['SITE']; ?></a></p>
    <?php } ?>
    <?php if ($ong['REDES_SOCIAIS']) { ?>
        <p><strong>Redes Sociais:</strong> <?php echo $ong['REDES_SOCIAIS']; ?></p>
    <?php } ?>
        </div>


        
        <button type="submit">Salvar Alterações</button>
    </form>
</div>
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = () => URL.revokeObjectURL(preview.src); // Libera a memória após o carregamento
}
</script>

</body>
</html>

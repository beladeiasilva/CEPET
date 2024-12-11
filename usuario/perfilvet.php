<?php 

include("config/logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Veterinário</title>
    <link rel="stylesheet" href="css/veterinarios.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
</head>
<body>    <?php include 'padrao/header.php'; ?>

<?php include("config/consulta/lista_vet.php"); ?>


    <main>
        

    <h1>Perfil do Veterinário</h1>
        <section class="perfil-container">
            <div class="foto-veterinario">
            <?php echo"<img src='/cepet/veterinario/img/img_perfil/$dados[IMG_PERFIL]'>";?>
            </div>
            <div class="info-veterinario">
                <h2><?php echo $dados["NOME_COMPLETO"];?></h2>
                <p><strong>Especialidade: </strong> Clínica Geral e Cirurgia</p>
                <p><strong>Localização: </strong> <?php echo $dados['CIDADE'] . ", " .  $dados['UF'];?></p>
                <p><strong>Telefone: </strong><?php echo $dados["TELEFONE"];?></p>
                <p><strong>E-mail: </strong><?php echo $dados["EMAIL"];?></p>
                <p><strong>Redes Sociais:</strong> <a href="#">Instagram</a> | <a href="#">Facebook</a></p>
                <button class="contato-btn">Entrar em Contato</button>
            </div>
        </section>
    </main>
    <?php include 'padrao/footer.php'; ?>
</body>
</html>

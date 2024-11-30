<?php

// Verifica se o usuário está logado
//include("config/logado.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estiloperfilong.css">
    <title>Perfil da ONG - Nome da ONG</title>
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
<?php include 'padrao/header.php'; ?>


<main>
    <div class="profile-container">
    <h1>Nome da ONG</h1>
        <div class="profile-picture">
            <img src="img/foto ongs/gavaa.jpeg" alt="Foto da ONG">
        </div>
        <div class="biography">
                <h2>Biografia</h2>
                <p>Aqui você encontrará um breve resumo sobre a ONG, incluindo a missão, os valores e os principais projetos em andamento. Nosso objetivo é fazer a diferença na vida dos animais e das pessoas que se conectam com eles.</p>
            </div>
        <div class="info-details">

            <p><strong>Endereço:</strong> Rua Exemplo, 123, CEP 00000-000 - Estado</p>
            <p><strong>Email:</strong> contato@ongexemplo.org</p>
            <p><strong>Telefone:</strong> (11) 1234-5678</p>
            <p><strong>Site:</strong> <a href="https://www.ongexemplo.org" target="_blank">www.ongexemplo.org</a></p>
            <p><strong>Redes Sociais:</strong> <a href="https://www.instagram.com/ongexemplo" target="_blank">Instagram</a>, <a href="https://www.facebook.com/ongexemplo" target="_blank">Facebook</a></p>
            
        </div>
    </div>
</main>
<h2>Pets da Nome_Ong</h2>
<div class="animal-grid">
        <div class="animal-card">
            <a href="pet.php?ID_PET=1"><img src="img/animais/cat (6).jpg" alt="Foto do animal"></a>
        </div>
        <div class="animal-card">
            <a href="pet.php?ID_PET=2"><img src="img/animais/dog (6).jpg" alt="Foto do animal"></a>
        </div>
        <div class="animal-card">
            <a href="pet.php?ID_PET=3"><img src="img/animais/dog (3).jpg" alt="Foto do animal"></a>
        </div>
        <!-- Adicione quantas cards precisar -->
    </div>

<?php include 'padrao/footer.php'; ?>
</body>
</html>

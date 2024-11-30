<?php 

include("config/logado.php");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONGs</title>
    <link rel="stylesheet" type="text/css" href="css/estiloongs.css"> 
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
</head>
<body>    <?php include 'padrao/header.php'; ?>




<div class="container">
    <!-- Sidebar de Filtros -->
    <div class="sidebar">
        <h3>Filtros</h3>

        <p>Nome da ONG</p>
        <input type="text" id="nomeONG" placeholder="Digite o nome da ONG">

        <p>Estado</p>
        <select name="estado" id="estado">
            <option value="">Selecione o estado</option>
            <option value="SP">São Paulo</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="MG">Minas Gerais</option>
            <!-- Adicione outros estados conforme necessário -->
        </select>

        <button onclick="filtrar()">Filtrar</button>
    </div>

    <!-- Grid de ONGs -->
    <div class="ong-grid" id="ong-grid">
        <!-- Exemplo de ONG (1) -->
        <div class="ong-card" data-nome="ONG Amiga" data-estado="SP">
        <img src="img/foto ongs/gavaa.jpeg">
            <h4>ONG Amiga</h4>
            <p>São Paulo</p>
        </div>

        <!-- Exemplo de ONG (2) -->
        <div class="ong-card" data-nome="SOS Animais" data-estado="RJ">
        <img src="img/foto ongs/cidadania-animal.png">
            <h4>SOS Animais</h4>
            <p>Rio de Janeiro</p>
        </div>

        <!-- Exemplo de ONG (3) -->
        <div class="ong-card" data-nome="Adoção Feliz" data-estado="MG">
        <img src="img/foto ongs/ong-das-patinhas.jpg">
            <h4>Adoção Feliz</h4>
            <p>Minas Gerais</p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>
        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
        <img src="">
            <h4> </h4>
            <p> </p>
        </div>
    </div>
</div>
<?php include 'padrao/footer.php'; ?>

<script>
    function filtrar() {
        const nomeONG = document.getElementById('nomeONG').value.toLowerCase();
        const estado = document.getElementById('estado').value;

        const ongs = document.querySelectorAll('.ong-card');

        ongs.forEach(ong => {
            const nome = ong.getAttribute('data-nome').toLowerCase();
            const ongEstado = ong.getAttribute('data-estado');

            if (
                (nome.includes(nomeONG) || nomeONG === '') &&
                (ongEstado === estado || estado === '')
            ) {
                ong.style.display = 'block';
            } else {
                ong.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>
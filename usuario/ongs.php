<?php 
session_start();

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
<body>
<header>
    <div class="logoimg">
        <a href="/cepet/usuario/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
    </div>
    <div class="headerlogin">
    <?php if ($logado): ?>
                
                <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá, <?php 
                include("config/conexao.php");  $sql ="SELECT NOME_DE_USUARIO FROM usuarios WHERE ID_USUARIO = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME_DE_USUARIO'];
                echo $nome['NOME_DE_USUARIO']; ?> !</span>
                <!------------------------------------------------------------------------------------------------------->

                <a class="link_sair" href="/cepet/configuracao/sair.php">
                    <button class="link_sairbt">Sair</button>
                </a>
                
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login </a>
                <p> / </p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
                </div>
                <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
                <?php endif; ?>

        
    </div>
     <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
    <?php
        if($logado==true){
        include("config/conexao.php");
        $sql="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id'";
        $result= mysqli_query($mysqli, $sql);
        $img_perfil = mysqli_fetch_assoc($result);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='perfilusuario.php'><img class='pessoa' src='img/imagens_perfil/$img_perfil[IMG_PERFIL]'>";}
    ?>
    <!----------------------------------------------------------------------------------------------------->

</header>
<nav>
    <ul class="barra-navegacao">
        <li><a href="adocao.php">Adoção</a></li>
        <li><a href="ONGs.php">ONGs</a></li>
        <li><a href="doacao.php">Doação</a></li>
        <li><a href="Noticias.php">Notícias e dicas</a></li>
    </ul>
</nav>



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
            <h4>ONG Amiga</h4>
            <p>São Paulo</p>
        </div>

        <!-- Exemplo de ONG (2) -->
        <div class="ong-card" data-nome="SOS Animais" data-estado="RJ">
            <h4>SOS Animais</h4>
            <p>Rio de Janeiro</p>
        </div>

        <!-- Exemplo de ONG (3) -->
        <div class="ong-card" data-nome="Adoção Feliz" data-estado="MG">
            <h4>Adoção Feliz</h4>
            <p>Minas Gerais</p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>

        <div class="ong-card" data-nome="" data-estado="">
            <h4> </h4>
            <p> </p>
        </div>
    </div>
</div>

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
                <textarea placeholder="Digite sua sugestão de melhoria :"></textarea>
                <button>Enviar</button>
            </div>
            
        </div>
        <p>© 2024 Cepet - Todos os direitos reservados.</p>
    </footer>

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
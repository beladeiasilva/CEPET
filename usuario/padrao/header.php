

<header>
        <div class="logoimg">
            <a href="/cepet/usuario/inicial.php"><img src="/cepet/usuario/img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>
                
                 <!-----------------------------------NOME DO USUARIO PELO ID------------------------------------------>
                <span class="user-name">Olá, <?php 
                include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");  $sql ="SELECT NOME_DE_USUARIO FROM usuarios WHERE ID_USUARIO = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME_DE_USUARIO'];
                echo $nome['NOME_DE_USUARIO']; ?> !</span>
                <!------------------------------------------------------------------------------------------------------->

                    <a class="link_sair" href="/cepet/usuario/config/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login </a>
                <p>/</p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="/cepet/usuario/img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>


         <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
        $sql="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id' ";
        $result= mysqli_query($mysqli, $sql);
        $img_perfil = mysqli_fetch_assoc($result);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='/cepet/usuario/perfilusuario.php'><img class='pessoa' src='/cepet/usuario/img/imagens_perfil/$img_perfil[IMG_PERFIL]'>";}
        ?>
        <!----------------------------------------------------------------------------------------------------->
    </header>


    <nav>
    <ul class="barra-navegacao">
        <li><a href="/cepet/usuario/adocao.php">Adoção</a></li>
        <li><a href="/cepet/usuario/ongs.php">ONGs</a></li>
        <li><a href="/cepet/usuario/doacao.php">Doação</a></li>
        <li><a href="/cepet/usuario/consulta.php">Consulta</a></li>
        <li><a href="/cepet/usuario/noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
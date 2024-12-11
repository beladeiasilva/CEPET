<header>
        <div class="logoimg">
            <a href="inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>

                <h2><span class="user-name"><?php 
                include("config/conexao.php");  $sql ="SELECT NOME FROM ongs WHERE cnpj = '$_SESSION[cnpj]'";
                $result = mysqli_query($mysqli, $sql);
                $nome = mysqli_fetch_assoc($result);
                $nome['NOME'];
                echo $nome['NOME']; ?></span></h2>


                <a href="config/sair.php"><button class="link_sairbt">Sair</button></a>
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login </a>
                <p> ou </p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <?php endif; ?>
        <?php
        if($logado==true){
        include("config/conexao.php");
        $sql="SELECT IMG_PERFIL_ONG FROM ongs WHERE CNPJ = '$cnpj' ";
        $result= mysqli_query($mysqli, $sql);
        $img_perfil = mysqli_fetch_assoc($result);
        $img_perfil['IMG_PERFIL_ONG'];
        echo"<a href='perfilong.php'><img class='pessoa' src='img/imagens_perfil/$img_perfil[IMG_PERFIL_ONG]'><a/>";}
        ?>
        
    </header>
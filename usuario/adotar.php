<?php

// Verifica se o usuário está logado
include("config/logado.php");


if(!empty($_GET['ID_PET']) && isset($_POST['continuar'])){

$id_pet = $_GET['ID_PET'];
include('conexao.php');
$sql1="SELECT * FROM pets WHERE ID_PET = '$id_pet'";
$sql2="SELECT * FROM adocao WHERE FK_PET_ID='$id_pet'";
$result1=mysqli_query($mysqli, $sql1);
$result2=mysqli_query($mysqli, $sql2);

$cnpj=mysqli_fetch_assoc($result1);
$cnpj['FK_ONG_CNPJ'];


if($result2->num_rows > 0){
die("<h1> Você ja adotou esse pet POHA, KARAI <h1>");
}
else{
$result= mysqli_query($mysqli, "INSERT INTO ADOCAO (DATA_ADO, HORA_ADO, FK_PET_ID, FK_USUARIO_ID, FK_ONG_CNPJ) VALUES (now(), now(),'$id_pet','$id','$cnpj[FK_ONG_CNPJ]')");
}


}







?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adotar.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adotar</title>
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

                    <a class="link_sair" href="config/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="/cepet/ambos/login.php">Faça o login </a>
                <p> ou </p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
       
        <?php endif; ?>
        <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include("config/conexao.php");
        $sql="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id' ";
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

    <section id="bloco1" class="active">
        <h2>Formulário de Interesse de adoção</h2>
        <p>Estamos muito felizes por você estar dando esse importante passo para adotar um pet e oferecer um lar cheio de carinho e cuidado!
        </p>
        <p>
        Ao prosseguir, você concorda em compartilhar as suas informações pessoais, como nome, CPF, endereço, telefone, e e-mail, já salvas no seu cadastro, diretamente com a ONG responsável pelo pet. Essas informações serão usadas exclusivamente para que a ONG possa entrar em contato com você e dar continuidade ao processo de adoção.
        Você terá a opção de escrever uma mensagem para a ONG na próxima etapa, se desejar. Essa mensagem será enviada junto com suas informações pessoais.
        </p>
        <p>
        Queremos reforçar que todo o processo de adoção, incluindo entrevistas e o contato direto, é de responsabilidade da ONG . Eles terão até 48 horas para entrar em contato com você após a submissão dos seus dados.
        Lembre-se que estamos aqui para apoiar e garantir que o processo seja o mais tranquilo possível. Agradecemos por confiar na nossa plataforma e por ajudar a transformar a vida de um animalzinho!
        </p>
        <div class="checkbox-container">
            <input type="checkbox" id="termos" onclick="verificarTermos()">
            <label for="termos">
            Declaro que sou maior de 18 anos, li e estou ciente das informações fornecidas, e concordo em compartilhar meus dados pessoais com a ONG/protetor parceiro do programa CEPET para fins de contato referente ao processo de adoção. Entendo que o envio dos meus dados demonstra o meu interesse em ser contactado pela ONG/protetor para dar continuidade ao processo, incluindo entrevistas e etapas posteriores.
            </label>
        </div>
      
        <button class="btn" name="continuar" id="btnContinuar1" disabled>Continuar</button>
       
    </section>


    <section id="bloco2" class="hidden">
        <h2>Deixe uma Mensagem para ONG (opcional):</h2>
        <textarea placeholder="Escreva aqui uma mensagem para ONG..."></textarea>
        

        <form action="<?php echo"adotar.php?ID_PET=$_GET[ID_PET]"; ?>"method="POST">
        <!-- Botão para colocar função que vai mandar dados para ong -->
        <button class="btn" name="continuar" onclick="mostrarBloco(3)">Continuar</button>
        </form>

    </section>


    <section id="bloco3" class="hidden">
        <h2>Agora é só aguardar o contato da ONG/protetor</h2>
        <p>Obrigado por se interessar em adotar! A ONG entrará em contato com você em breve.</p>
    </section>




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
    // Função para mostrar o próximo bloco
    function mostrarBloco(bloco) {
        // Oculta todos os blocos e remove a classe 'active'
        document.getElementById('bloco1').classList.add('hidden');
        document.getElementById('bloco1').classList.remove('active');
        
        document.getElementById('bloco2').classList.add('hidden');
        document.getElementById('bloco2').classList.remove('active');
        
        document.getElementById('bloco3').classList.add('hidden');
        document.getElementById('bloco3').classList.remove('active');

        // Mostra apenas o bloco atual
        document.getElementById('bloco' + bloco).classList.remove('hidden');
        document.getElementById('bloco' + bloco).classList.add('active');
    }

    // Função para verificar se o checkbox está selecionado
    function verificarTermos() {
        var checkbox = document.getElementById("termos");
        var btn = document.getElementById("btnContinuar1");

        // Habilita ou desabilita o botão de continuar com base no checkbox
        btn.disabled = !checkbox.checked;  // Habilita o botão apenas se o checkbox estiver marcado
    }

    // Adicionando um evento de clique no botão "Continuar" do bloco 1
    document.getElementById('btnContinuar1').addEventListener('click', function() {
        var checkbox = document.getElementById("termos");

        if (checkbox.checked) {
            // Se o checkbox estiver marcado, permite continuar
            mostrarBloco(2);
        } else {
            // Caso contrário, exibe um alerta
            alert('Você deve concordar com os termos de adoção para continuar.');
        }
    });

    // Adicionando evento de clique no botão "Continuar" do bloco 2 para ir para o bloco 3
    document.getElementById('btnContinuar2').addEventListener('click', function() {
        mostrarBloco(3);
    });
</script>


    </script>
</body>
</html>
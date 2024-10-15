<?php
session_start();
//-------------------------------------SESSÃO DO USUÁRIO CADASTRADO--------------------------------------------//


if(isset($_POST['doar'])) 
{
  include('conexao.php');
//----------------Declarando váriaveis pelo método POST-------//
$ongs = $_POST['ongs'];
$form_pag =$_POST['paymentMethod'];
$dinheiro  =$_POST['valor'];
$nomeU = $_SESSION['usuario'];
//------------------------------------------------------------//

//----------------Utilizando da váriavel "$ongs" o nome registrado do BD, para pesquisar o CNPJ---------------//
$sql2 = "SELECT * FROM ongs WHERE NOME = '$ongs'";
$vcnpj = mysqli_query($mysqli, $sql2);
$cnpjO = mysqli_fetch_assoc($vcnpj);
$cnpj = $cnpjO['CNPJ'];
//------------------------------------------------------------------------------------------------------------//

//-----------------Utilizando da váriavel "$nomeU" o nome registrado da SESSÃO, para pesquisar o ID_USUARIO---//
 $sql3 = "SELECT * FROM usuarios WHERE NOME_DE_USUARIO = '$nomeU'";
 $vidU = mysqli_query($mysqli, $sql3);
 $idU = mysqli_fetch_assoc($vidU);
 $id = $idU['ID_USUARIO'];
//------------------------------------------------------------------------------------------------------------//


//----------------------------------------INSERINDO AO BANCO DE DADOS-----------------------------------------//
 $result2 = mysqli_query($mysqli, "INSERT INTO DOACAO(FORM_PAG, VALOR_PAG, DATA_PAG, HORA_PAG, FK_USUARIO_ID, FK_ONG_CNPJ)
 VALUES ('$form_pag','$dinheiro',now(),now(),'$id','$cnpj')");
//------------------------------------------------------------------------------------------------------------//

header('Location: inicial.php');
}

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
} else {
    $logado = true;
    $usuario = $_SESSION['usuario'];  // Nome do usuário
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações para ONGs</title>
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
    <link rel="stylesheet" href="css/estilodoacao.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
<header>
        <div class="logoimg">
            <a href="/conexao/paginas/inicial.php"><img src="img/logos/cepet-preto.png" alt="Logo Cepet"></a>
        </div>
        <div class="headerlogin">
            <?php if ($logado): ?>
                <span class="user-name">Olá, <?php echo $usuario; ?> !</span>
                
                    <a class="link_sair" href="/conexao/configuracao/sair.php">
                        <button class="link_sairbt">Sair</button>
                    </a>
                
            <?php else: ?>
                <a href="login.php">Faça o login </a>
                <p> ou </p>
                <a href="/conexao/forms_cd/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
        <?php endif; ?>


         <!---------------------------------FOTO DE PERFIL ICONE-------------------------------------------->
        <?php
        if($logado==true){
        include('conexao.php');
        $sql="SELECT IMG_PERFIL FROM usuarios WHERE NOME_DE_USUARIO = '$usuario' ";
        $result= mysqli_query($mysqli, $sql);
        $img_perfil = mysqli_fetch_assoc($result);
        $img_perfil['IMG_PERFIL'];
        echo"<a href='perfil/perfilusuario.php'><img class='pessoa' src='perfil/imagens_perfil/$img_perfil[IMG_PERFIL]'>";}
        ?>
        <!----------------------------------------------------------------------------------------------------->
    </header>


    <nav>
    <ul class="barra-navegacao">
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>

    <!--NÃO TERMINADO-->


    <!--Método "POST" Essencial para a conexão dos dados.----------------------------------->    
    <form action="doacao.php" method="POST">
    <!-------------------------------------------------------------------------------------->    


    <h1>Faça sua Doação para as ONGs Cadastradas</h1>
    <main>
        <form id="donationForm">

        <label> <h3>Escolha a ONG que deseja apoiar: </h3></label> 
      
            <!---------------------------CÓDIGO PHP INTEGRADO COM HTML PARA PESQUISAR ONGS CADASTRADAS (INICIO)----------->
           <?php
            include('conexao.php');
        
                $sql="SELECT * FROM ongs;";
                $result= mysqli_query($mysqli, $sql);
            ?>

            
            <select name="ongs">
                <option value="Selecione" selected>Selecione...</option>
                <?php while ($dados = mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $dados['NOME'] ?>"> 
                <?php echo $dados['NOME']?>
                </option> 
                <?php }   ?>
            </select>   
            <!---------------------------CÓDIGO PHP INTEGRADO COM HTML PARA PESQUISAR ONGS CADASTRADAS (FIM)-------------->
            <br>      <br>
           
            <h3>Escolha a forma de pagamento:</h3>
            <div id="opcaopagamento">
                <label>
                    <input type="radio" name="paymentMethod" value="credito"> Cartão de Crédito
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="debito"> Cartão de Débito
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="transferencia"> Transferência Bancária
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="pix"> Pix
                </label>
            </div>

            <h3>Escolha ou digite o valor da sua doação:</h3>
            <div id="suggestedValues">
                <button type="button" class="suggested-btn" data-value="10">R$10</button>
                <button type="button" class="suggested-btn" data-value="20">R$20</button>
                <button type="button" class="suggested-btn" data-value="50">R$50</button>
                <button type="button" class="suggested-btn" data-value="100">R$100</button>
            </div>

            <input type="number" name="valor" id="donationAmount" placeholder="Digite outro valor" min="1" required>

            <button type="submit" name="doar" id="payButton">Doar</button>
        </form>

        <div id="paymentResponse"></div>
    </main>


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
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/twitter.png" alt="Twitter"></a>
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
        // Inicializando Mercado Pago com sua credencial pública
        const mp = new MercadoPago('APP_USR-4108972a-d3fa-4e7e-9bc9-2c5d15700dd0', {
            locale: 'pt-BR'
        });

        // Preencher o campo com os valores sugeridos
        const suggestedButtons = document.querySelectorAll('.suggested-btn');
        const donationAmountInput = document.getElementById('donationAmount');

        suggestedButtons.forEach(button => {
            button.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                donationAmountInput.value = value; // Preenche o campo com o valor do botão
            });
        });

        document.getElementById('donationForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const selectedOng = document.querySelector('select[name="ong"]').value;
            const donationAmount = donationAmountInput.value;
            const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');

            if (!selectedOng || !donationAmount || !selectedPaymentMethod) {
                alert('Por favor, selecione uma ONG, insira um valor de doação e escolha uma forma de pagamento.');
                return;
            }

            // Criando preferência de pagamento
            const preference = {
                items: [{
                    title: `Doação para ${selectedOng}`,
                    quantity: 1,
                    currency_id: 'BRL',
                    unit_price: parseFloat(donationAmount)
                }],
                back_urls: {
                    success: "http://www.seusite.com.br/sucesso",
                    failure: "http://www.seusite.com.br/falha",
                    pending: "http://www.seusite.com.br/pendente"
                },
                auto_return: "approved"
            };

            mp.checkout({
                preference: {
                    items: preference.items,
                    back_urls: preference.back_urls,
                    auto_return: preference.auto_return
                }
            }).open();
        });
    </script>
</body>
</html>

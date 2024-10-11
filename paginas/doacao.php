<?php
session_start();
//-------------------------------------SESSÃO DO USUÁRIO CADASTRADO--------------------------------------------//


if(isset($_POST['doar'])) 
{
  include('conexao.php');
//----------------Declarando váriaveis pelo método POST-------//
$ongs = $_POST['ongs'];
$form_pag =$_POST['paymentMethod1'];
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

header('Location: login.php');
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
    <link rel="stylesheet" href="styles.css">
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
    </header>

    <nav>
        <ul class="barra-navegacao">
            <li><a href="adocao.php">Adoção</a></li>
            <li><a href="#ONGs">ONGs</a></li>
            <li><a href="doacao.php">Doação</a></li>
            <li><a href="#Noticias">Noticias e dicas</a></li>
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
                    <input type="radio" name="paymentMethod1" value="credito" required> Cartão de Crédito
                </label>
                <label>
                    <input type="radio" name="paymentMethod2" value="debito"> Cartão de Débito
                </label>
                <label>
                    <input type="radio" name="paymentMethod3" value="transferencia"> Transferência Bancária
                </label>
                <label>
                    <input type="radio" name="paymentMethod4" value="pix"> Pix
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

<?php


// Verifica se o usuário está logado
include("config/logado.php");

include("config/doando.php");


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações para ONGs</title>
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
    <link rel="stylesheet" href="css/estilodoacao.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
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
                <p>/</p>
                <a href="/cepet/cadastro/cadastrousuario.php">Cadastre-se!</a>
            
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png" alt="Ícone de perfil">
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

    <!--NÃO TERMINADO-->


    <!--Método "POST" Essencial para a conexão dos dados.----------------------------------->    
    <form action="config/doando.php" method="POST">
    <!-------------------------------------------------------------------------------------->    


    <h1>Faça sua Doação para as ONGs Cadastradas</h1>
    <main>
        <form id="donationForm">

        <label> <h3>Escolha a ONG que deseja apoiar: </h3></label> 
      
            <!---------------------------CÓDIGO PHP INTEGRADO COM HTML PARA PESQUISAR ONGS CADASTRADAS (INICIO)----------->
           <?php
            include("config/conexao.php");
        
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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações para ONGs</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/logos/icon.ico">  
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <!--NÃO TERMINADO-->

    <h1>Faça sua Doação para as ONGs Cadastradas</h1>
    <main>
        <form id="donationForm">

            <h3>Escolha a ONG que deseja apoiar:</h3>
            <div id="ongList">
                <select name="ong" required>
                    <option value="">Selecione uma ONG</option>
                    <option value="ONG1">Cuidadores de Animais</option>
                    <option value="ONG2">Amigo dos Pets</option>
                    <option value="ONG3">Patinhas Felizes</option>
                </select>
            </div>

            <h3>Escolha a forma de pagamento:</h3>
            <div id="opcaopagamento">
                <label>
                    <input type="radio" name="paymentMethod" value="cartaocredito" required> Cartão de Crédito
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="cartaodebito"> Cartão de Débito
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

            <input type="number" id="donationAmount" placeholder="Digite outro valor" min="1" required>

            <button type="submit" id="payButton">Doar</button>
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

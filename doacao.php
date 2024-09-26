<?php
  use MercadoPago\Client\Payment\PaymentClient;
  use MercadoPago\MercadoPagoConfig;

  // Configurando a credencial do Mercado Pago
  MercadoPagoConfig::setAccessToken("APP_USR-6590303315220006-092315-d2ab46d1e57128ba40a55ee86f0d93cc-1026520807");

  // Inicializando o cliente de pagamento
  $client = new PaymentClient();
  $request_options = new MPRequestOptions();

  // Definindo um cabeçalho customizado para idempotência
  $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

  // Criando o pagamento com os dados enviados pelo formulário
  $payment = $client->create([
    "token" => isset($_POST['token']) ? $_POST['token'] : null,  // Se disponível, utiliza o token
    "issuer_id" => isset($_POST['issuer_id']) ? $_POST['issuer_id'] : null,  // Se disponível, utiliza o issuer_id
    "payment_method_id" => $_POST['paymentMethodId'],  // ID do método de pagamento
    "transaction_amount" => (float) $_POST['transactionAmount'],  // Valor da transação
    "installments" => isset($_POST['installments']) ? $_POST['installments'] : 1,  // Parcelamento, com valor padrão de 1
    "payer" => [
      "email" => $_POST['email'],  // E-mail do pagador
      "identification" => [
        "type" => isset($_POST['identificationType']) ? $_POST['identificationType'] : null,  // Tipo de identificação, se fornecido
        "number" => isset($_POST['number']) ? $_POST['number'] : null  // Número de identificação, se fornecido
      ]
    ]
  ], $request_options);

  // Exibindo o resultado do pagamento
  echo implode($payment);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações para ONGs</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h1>Faça sua Doação para as ONGs Cadastradas</h1>
    <div id="paymentBrick_container"></div>

</body>
</html>

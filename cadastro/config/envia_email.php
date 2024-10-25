<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>valida_email</title>
</head>
<body>
   
</body>


<?php 

use PHPMailer\PHPMailer\PHPMailer;
require 'smtp/vendor/autoload.php';

//Domínio de envio;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '054bb168b75c88';
$mail->Password = '8aebff6a0711b2';
//Indicando os cabeçalhos(Remetente, Destinatário e Assunto);

$mail->setFrom(address:'CEPET@gmail.com', name:'CEPET');
$mail->addAddress(address: $emailU, name: $nomelogin ); // Aqui é obrigatoriamente colocar um endereço "@dev.com"
$mail->Subject = 'Confirme o seu email';


$mail->isHTML(isHtml: TRUE);
$mail->Body = "<html>Olá $nomelogin!, Obrigado por se cadastrar na CEPET! Por favor, click no link abaixo para confirmar seu email de cadastro: <br> <br> <a href='http://localhost/conexao/forms_cd/valida_email.php' </a> </hmtl>";







if (!$mail->send()) {
   echo 'A mensagem não pôde ser enviada.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'A mensagem foi enviada.';
}
?>
</html>
<?php 

require("PHPMailerAutoload.php");

$mail = new PHPMailer;
$mail->isSMTP();
$mail->CharSet= "UTF-8";

$mail->Host = "smtp.gmail.com";
$mail->Port ="587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth ="true";
$mail->Username ="seuemail@gmail.com";
$mail->Password ="suasenha";

$mail->setFrom($email->Username, 'CEPET'); //REMETENTE
$mail->addAddress($email); //DESTINATÁRIO
$mail->Subject = $nome . ", Ative seu Cadastro Aqui!"; //Assunto do e-mail

$conteudo_email ="
<style>
font-family = Calibri;
</style> 

<body>
Confirme esse e-mail para ativar seu cadastro em nosso site.<br>
Você só precisa clicar no botão abaixo: <br><br>

<a href= 'http://localhost/conexao/configuracao/ativacao.php?hash' 
style='background-color: #007bff;
border: none;
color: white;
padding:10 px 30 px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size:16px;'
>Confirmar E-mail</a>
</body>";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if($mail->send()){

   echo "<div class='alert alert-danger' role='alert'> O link de ativação de cadastro foi enviado para seu email, Favor verificar sua caixa de entrada.";
}
   else{

     echo "<div class='alert alert-danger' role='alert'> Falha ao Enviar o link de Ativação!";
   }

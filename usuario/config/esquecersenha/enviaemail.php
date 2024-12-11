
<?php 

use PHPMailer\PHPMailer\PHPMailer;
require 'C:/xampp/htdocs/cepet/usuario/config/smtp/vendor/autoload.php';

//Domínio de envio;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '90da7d402c4fe6';
$mail->Password = '392e73ce48b3d1';
$mail->CharSet  = 'utf8';

//Indicando os cabeçalhos(Remetente, Destinatário e Assunto);
$mail->addEmbeddedImage('C:/xampp/htdocs/cepet/cadastro/img/logos/cepet-preto.png', 'unique_id', 'cepet-preto.png');
$mail->setFrom(address:'CEPET@gmail.com', name:'CEPET');
$mail->addAddress(address: $email, name: $dados['NOME_DE_USUARIO'] ); // Aqui é obrigatoriamente colocar um endereço "@dev.com"
$mail->Subject = 'Confirme o seu email';


$mail->isHTML(isHtml: TRUE);
$mail->Body = "<img style=' right: -50px; width: 150px; margin-rigth: 500px; ' src='cid:unique_id' alt=''</style> </img> <br><br>
               <hr style='background-color: #3d9f9b; min-height: 30px;> </hr>'<br> <br>
               <h1 style='color: #14948e; font-family: 'Poppins', sans-serif; font-size: 16px; text-align:'center';'>Olá $dados[NOME_DE_USUARIO]!<h1> 
               <h3>Esqueceu sua senha de login na CEPET?<br><br>
               Por favor, click no link abaixo para redefinir sua senha:<br><br>
               <a href='http://localhost/cepet/usuario/redefinicaosenha.php?ID_USUARIO=$dados[ID_USUARIO]'>Redefina sua senha!</a><h3>";


          








if (!$mail->send()) {
   echo 'A mensagem não pôde ser enviada.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
         header("Location: /cepet/usuario/config/esquecersenha/emailenviado.php");
}
?>
</html>


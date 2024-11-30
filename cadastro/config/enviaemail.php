
<?php 

use PHPMailer\PHPMailer\PHPMailer;
require 'smtp/vendor/autoload.php';

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
$mail->addAddress(address: $emailU, name: $nomelogin ); // Aqui é obrigatoriamente colocar um endereço "@dev.com"
$mail->Subject = 'Confirme o seu email';


$mail->isHTML(isHtml: TRUE);
$mail->Body = "<img style=' right: -50px; width: 150px; margin-rigth: 500px; ' src='cid:unique_id' alt=''</style> </img> <br><br>
               <hr style='background-color: #3d9f9b; min-height: 30px;> </hr>'<br> <br>
               <h1 style='color: #14948e; font-family: 'Poppins', sans-serif; font-size: 16px; text-align:'center';'>Olá $nomelogin!<h1> 
               <h3>Obrigado por se cadastrar na CEPET!<br><br>
               Por favor, click no link abaixo para confirmar seu email de cadastro:<br><br>
               <a href='http://localhost/cepet/cadastro/config/valida_email.php?ID_USUARIO=$id[ID_USUARIO]'>Confirmar Cadastro!</a><h3>";


          








if (!$mail->send()) {
   echo 'A mensagem não pôde ser enviada.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
         echo"<!DOCTYPE html>
               <html lang='pt-br'>
               <head>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Criar Conta</title>
                  <link rel='stylesheet' href='/cepet/cadastro/css/estilocadastro.css'> 
                  <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/padrao.css'>
                  <link rel='icon' href='/cepet/cadastroimg/logos/icon.ico'>  
                    <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/adotar.css'>
                  <script src='jscript/main.js' defer> </script>
               </head>
               
                  <div class='logoimg'>
               <img src='/cepet/cadastro/img/logos/cepet-preto.png' width='20%' alt='Logo Cepet'>
                     </div>
                     <hr style='background-color: #3d9f9b; min-height: 30px;> </hr>'<br> <br>
                     Verifique seu email para autenticar sua conta! <br> <br>
                     <button  class='btn'>
                     <a href='/cepet/ambos/login.php'>OK! </a> </button>
                      ";
}
?>
</html>


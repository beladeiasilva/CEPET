<?php


include("includes/config.php");
include("vendor/autoload.php");

use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
  
try{
    //Configuração do servidor
$mail->isSMTP();
$mail->Host            =SMTP_HOST;
$mail->SMTPAuth        =true; 
$mail->Username        =SMTP_USER; 
$mail->Password        =SMTP_PASS; 
$mail->Port            =SMTP_PORT; 

//Recipients
$mail->setFrom('sergiorafaelgithub520@gmail.com','Sergio Rafael');
$mail->addAddres('sergio@exemplo.com','Sergio');

//Content
$mail->isHTML(true);
$mail->Subject = 'Contato do Site';
$mail->Body = 'Sergio entrou em contato! <b> teste </b>';

$mail->send();
echo 'E-mail enviado com sucesso!';
}
catch (Exception $e) {
    echo "Error: {$mail->Errorinfo}";
}

?>
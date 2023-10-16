<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Instância da classe
$mail = new PHPMailer(true);
try
{
    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->setLanguage("br");
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'ti3@altasports.com.br';
    $mail->Password   = '#Meu270405';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'ssl';
    // Informações específicadas pelo Google
    $mail->Host = 'email-ssl.com.br';
    $mail->Port = 465;
    // Define o remetente
    $mail->setFrom('ti3@altasports.com.br', 'Felipe Rocha');
    // Define o destinatário
    $mail->addAddress('joaofeliperochads@gmail.com', 'João Felipe Rocha da Silva');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Teste Envio de Email';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá!</b>';
    $mail->AltBody = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->SMTPDebug = 2;
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

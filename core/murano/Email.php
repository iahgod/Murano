<?php

namespace core\murano;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use \src\Config;
use \src\Constant;

class Email {

    public static function enviar($toEmail, $name, $assunto, $mensagem){

        $mensagemFinal =  '<div style="padding:10px;font-size:18px;background-color:#ccc;">'.$assunto.'</div>';
        $mensagemFinal .= '<p>'.$mensagem.'</p>';
        $mensagemFinal .= '<div style="padding:10px;font-size:15px;background-color:#ccc;margin-top:10px;">Enviado do sistema: '.Constant::TITULO_SITE.'</div>';

        $mail = new PHPMailer(true);
        $email = false;
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = Config::HOST;                   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = Config::USER;               //SMTP username
            $mail->Password   = Config::PASSWORD;                            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = Config::PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(Config::FROM_EMAIL, Config::FROM_NAME);
            $mail->addAddress($toEmail, $name);
            $mail->addReplyTo(Config::FROM_EMAIL, Config::FROM_NAME);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = utf8_decode($assunto);
            $mail->Body    = utf8_decode($mensagemFinal);
            $mail->AltBody = $assunto;

            $mail->send();
            $email = true;
        } catch (Exception $e) {
        }
    }

}
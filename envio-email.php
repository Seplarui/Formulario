<?php
/**
 * Created by PhpStorm.
 * User: sepla
 * Date: 15/07/2017
 * Time: 13:14
 */

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail= new PHPMailer();


/**CONFIGURACIÓN PHP MAILER **/

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='';
$mail->Password='';

$mail->SMTPSecure='tls';
$mail->Port=587;

/*=========================*/

/** Configuración del correo a enviar. */
$mail->setFrom(''); //REMITENTE
$mail->addAddress(''); //DESTINATARIO

$mail->Subject='Este es el asunto';
$mail->Body='Este es el cuerpo del correo';

/*=========================*/

/**Envio del EMAIL **/

$mail->send();

/*=========================*/
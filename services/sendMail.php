<?php
include_once './phpMailer/class.phpmailer.php';

function sendMailContact() {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    $mail->isHTML(true);
    $mail->setFrom('email@gmail.com', 'Mailer');
    $mail->addAddress('email@gmail.com', 'Joe User');
    $mail->addReplyTo('email@gmail.com', 'Information');
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->Send();
}
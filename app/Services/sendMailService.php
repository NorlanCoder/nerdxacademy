<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMailService
{

    public function sendMail($content)
    {

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        // $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');   //  sender username
        $mail->Password = env('MAIL_PASSWORD');       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom('contact@nerdxdigital.com');
        $mail->addAddress('zsamuel737@gmail.com');
        $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = "Inscription à NerdXAcademy";
        $mail->Body    = $content;
        $success = $mail->send();
    }
}

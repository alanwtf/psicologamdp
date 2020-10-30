<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit']) && $_POST['email'] != ''){
     
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $name = $_POST['name'];
        $mailFrom = 'contacto@psicologa.com.ar';
        $subject = $_POST['subject'];
        $text = 'E-mail del contacto:' . $_POST['text'] . '\n \n';
        
        try {
            //Server settings
            $mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.hostinger.com.ar';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $mailFrom;                     // SMTP username
            $mail->Password   = 'BMXxX94!';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($mailFrom, $name);
            $mail->addAddress('alan.mathiasen@outlook.com');     // Add a recipient
            $mail->addAddress('mdmathiasen@outlook.com');               // Name is optional
            
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $text;

            $mail->send();
            echo 'Mensaje enviado correctamente, te estamos redireccionando.';
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    }
}

//header('Refresh: 3; URL=contacto.html');
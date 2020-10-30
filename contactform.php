

<?php
    $message_sent = false;
    if (isset($_POST['submit']) && $_POST['email'] != ''){
     
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //submit the form
            $name = $_POST['name'];
            $mailFrom = $_POST['email'];
            $subject = $_POST['subject'];
            $text = $_POST['text'];

            $mailTo = "alan.mathiasen@outlook.com, mdmathiasen@outlook.com";
            $headers = "From: " . $mailFrom;
            $txt = "Recibiste un mensaje de " . $name . ". \n\n" . $text;

            mail($mailTo, $subject, $txt, $headers);
            $message_sent = true;
            

        }                 
    }
?>

<?php
    if($message_sent):   
?>
Mensaje enviado correctamente! Te estamos redireccionando.
<?php
    else:   
?>
No se pudo enviar el mensaje, email incorrecto.

<?php
    endif;
    header('Refresh: 3; URL=contacto.html');
?> 
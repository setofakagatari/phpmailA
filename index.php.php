
<html>
<head>
<title>a</title></head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
if(isset($_POST['enviar'])){
    $fileName=$_FILES['archivo']['name'];
		
$fileSaved=$_FILES['archivo']['tmp_name'];
$username="crisilc";
$ticketName = "try001";
$affair ="asunto";
$description="descripcion";
$empresa="etb";
$tecnologia="cobre";
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ticketsetb@gmail.com';                     // SMTP username
    $mail->Password   = 'Bogota2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ticketsetb@gmail.com', $ticketName);
    $mail->addAddress('ticketsetb@gmail.com');     // Add a recipient
    

    // Attachments
    
    $mail->addAttachment($fileSaved, $fileName);    //Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $affair;
    $mail->Body    = $description. '<br>' .$username. '<br>' .$empresa. '<br>' .$tecnologia;
    $mail->Charset = 'UFT-8';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo  "el Mensaje se envio correctamente";
} catch (Exception $e) {
    
    echo  "hubo un error al enviar el mensaje: ", $mail->ErrorInfo;
}
}
/* 
<?php
        //En el destino colocar el correo alque quieres que lleguen los datos del contacto de tu formulario
 $destino = "ticketsetb@gmail.com";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $mensaje = $_POST["mensaje"];
    $contenido = "Nombre: " . $nombre . "\nApellido: " . $apellido . "\nCorreo: " . $email . "\nNúmero: " . $numero . "\nAsunto: " . $mensaje;
    mail($destino, "Contacto", $contenido);
   
//Esto es opcional, aqui pueden colocar un mensaje de "enviado correctamente" o redireccionarlo a algun lugar
?>
*/
?>
<form action='' method="post" enctype="multipart/form-data">
<input type="file" name="archivo"/>
    <input type="submit" name="enviar">
</form>

</body>
</html>



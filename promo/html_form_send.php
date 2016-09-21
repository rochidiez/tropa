
<?php
/*
if(isset($_POST['email'])) {
  
  // CHANGE THE TWO LINES BELOW
  $email_to = "colegiales@crossfittropa.com";
  
  $email_subject = "Reserva clase de prueba";
  
  
  function died($error) {
    // your error code can go here
    echo "Te pedimos disculpas. Hubo un problema<br /><br />";
    echo $error."<br /><br />";
    echo "Por favor vuelve atras y vuelve a intentarlo.<br /><br />";
    die();
  }
  
  // validation expected data exists
  if(!isset($_POST['first_name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['last_name']) ||
    !isset($_POST['telephone']) ||
    !isset($_POST['comments'])) {
    died('Te pedimos disculpas, parece que hubo un conflicto en el envío del formulario. Por favor vuelve a intentar o comunicate con contacto@crossfittropa.com');   
  }
  
  $first_name = $_POST['first_name']; // required
  $email_from = $_POST['email']; // required
  $last_name = $_POST['last_name']; // required
  $telephone = $_POST['telephone']; // not required
  $comments = $_POST['comments']; // required
  
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Ups, parece que no escribiste bien tu email<br />';
  }
  $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Ups, parece que no escribiste bien tu nombre.<br />';
  }
  
  if(strlen($error_message) > 0) {
    died($error_message);
  }
  $email_message = "RESERVA PARA CLASE DE PRUEBA en ".$last_name."\n\n";
  
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }
  
  $email_message .= "Nombre: ".clean_string($first_name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Box: ".clean_string($last_name)."\n";
  $email_message .= "Fecha: ".clean_string($telephone)."\n";
  $email_message .= "Hora: ".clean_string($comments)."\n";
  


  
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  


header("Location: ok.html");
?>

<!-- place your own success html below -->



<?php
}
die();
?>

*/
require("class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "crossfittropa.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "colegiales@crossfittropa.com"; // Correo completo a utilizar
$mail->Password = "Bope1325"; // Contraseña
$mail->Port = 25; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "colegiales@crossfittropa.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Tropa";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress("colegiales@crossfittropa.com"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = “Titulo”; // Este es el titulo del email.
$body = “Hola mundo. Esta es la primer línea<br />”;
$body .= “Acá continuo el <strong>mensaje</strong>”;
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo ‘El correo fue enviado correctamente.’;
}else{
echo ‘Hubo un inconveniente. Contacta a un administrador.’;
}

?>

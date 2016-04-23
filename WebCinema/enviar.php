<?php
date_default_timezone_set("Europe/Madrid");
require_once ('funciones/funciones.php');
if(isset($_POST["mail"]) && validarCorreo($_POST["mail"])){
	include("class/class.phpmailer.php");
	include("class/class.smtp.php");
	$mail = new PHPMailer();
	$mail -> isSendMail();
	$mail -> SMTPAuth = true;
	$mail -> SMTPSecure = "ssl";
	$mail -> Host = "smtp.gmail.com";
	$mail -> Port = 465;
	$mail -> Username = "theatrumcinema@gmail.com";
	$mail -> Password = "modesuperprofe";
	$mail -> From = "theatrumcinema@gmail.com";
	$mail -> FromName = "Theatrum Cinema";
	$mail -> Subject = "Entradas";
	$mail -> AltBody = "alt Este es un mensaje de prueba";
	$sha = $_POST["mail"] . "". date('j-m-y');
	$mail -> MsgHTML("<p>Presente el siguiente código en su taquilla para validar sus entradas.</p><br /><img src='http://www.codigos-qr.com/qr/php/qr_img.php?d=TheatrumCinema%20%20http://theatrumcinema.informaticaneko.es%20%20" . sha1($sha) ."' />.");
	$mail -> AddAddress($_POST["mail"], "Destinatario");
	$mail -> IsHTML(true);
	if (!$mail -> Send()){
		echo "Error: " . $mail -> ErrorInfo;
	}else {
		header("Location:volver.php");
	}
}else{
	header("Location:correo.php");
}
?>
<?php
	if(isset($_POST["btnContacto"])){
	// definimos el mensaje
	$mensaje="";
	$mensaje.="Enviado por:". "\n\n";
	$mensaje.="Nombre: ".$_POST['nombre']."\n";
	$mensaje.="E-mail: ".$_POST['email']."\n";
	$mensaje.="Telefono: ".$_POST['telefono']."\n";
	$mensaje.="Mensaje: ".$_POST['comentario']."\n";
	// definimos a quien se lo enviamos
	$email_destiny="info@inteli-code.com.mx";
	$subject="--Correo WEB. <> ". $_POST['asunto'];
	// verificamos si se envió
	if (mail($email_destiny,$subject,$mensaje,"From: Contacto<".$_POST['email'].">")) {
		echo 'Mensaje enviado';
	} else {
		echo 'Error '.$_POST['nombre'];
	}
	}
	
	
	if(isset($_POST["btn"])){
	// definimos el mensaje
	$mensaje="";
	$mensaje.="Enviado por:". "\n\n";
	$mensaje.="Nombre: ".$_POST['nombre']."\n";
	$mensaje.="E-mail: ".$_POST['email']."\n";
	$mensaje.="Telefono: ".$_POST['telefono']."\n";
	$mensaje.="Mensaje: ".$_POST['comentario']."\n";
	// definimos a quien se lo enviamos
	$email_destiny="sheloveyou1@hotmail.com";
	$subject="--Correo WEB. <> ". $_POST['asunto'];
	// verificamos si se envió
	if (mail($email_destiny,$subject,$mensaje,"From: Contacto<".$_POST['email'].">")) {
		echo '<p align="center"><b>Mensaje enviado</b></p>';
	} else {
		echo '<p align="center">Error '.$_POST['nombre'].'</p>';
	}
	}
?>
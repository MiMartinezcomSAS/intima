<?php
	$nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $ciudad=$_POST["ciudad"];
    $mensaje=$_POST["mensaje"];
    $mensajecorreo=false;
    $errorMessage= array( false,false,false,false,);
    $error=false;
	if (empty($nombre)){
		$errorMessage[0]=true;
		$errornombre="debe ingresar un nombre";
		$error=true;
	}
	if (empty($correo)){
		$errorMessage[1]=true;
		$error=true;
	}else{
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errorMessage[1]=true;
			$error=true;
		}
	} 
	if (empty($ciudad)){
		$errorMessage[2]=true;
		$error=true;
	}
	if (empty($mensaje)){
		$errorMessage[3]=true;
		$error=true;
	}

	if ($error==false){
		enviar();
	}



	function enviar(){
		$mensajeenviar= "nombre: ".$_POST["nombre"]."\n correo: ".$_POST["correo"]."\n ciudad: ".$_POST["ciudad"]."\n mensaje: ".$_POST["mensaje"]."\n\n";
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail("tiendavirtual@innova-quality.com.co","envio formulario contactenos", $mensajeenviar, $headers);
		$mensajecorreo=true;
	}
?>
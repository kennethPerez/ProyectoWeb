<?php
	$array_data = array();
	$nombre = $_POST['_Nombre'];
	$mensaje = $_POST['_Mensaje'];
	$email = $_POST['_Mail'];

	sleep(3);

	$array_data[] = validarNombre($nombre);
	$array_data[] = validarEmail($email);
	$array_data[] = validarMensaje($mensaje);
	echo json_encode($array_data);

	function validarNombre($nombre)
	{
		if(strlen($nombre) >= 5)
			return array(
				'Estado' => "Correcto",
				'Campo' => "#caja_nombre"
				);
		else
			return array(
				'Estado' => "Incorrecto",
				'Campo' => "#caja_nombre",
				'Error' => "El nombre debe tener al menos 5 caracteres.",
				'Div' => "#error_nombre"
				);
	}

	function validarEmail($email)
	{
		if(preg_match(
		'/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
		$email))
			return array(
				'Estado' => "Correcto",
				'Campo' => "#caja_email"
				);
		else
			return array(
				'Estado' => "Incorrecto",
				'Campo' => "#caja_email",
				'Error' => "Escriba un email válido.",
				'Div' => "#error_email"
				);
	}

	function validarMensaje($mensaje)
	{
		if(strlen($mensaje) >= 10)
			return array(
				'Estado' => "Correcto",
				'Campo' => "#caja_mensaje"
				);
		else
			return array(
				'Estado' => "Incorrecto",
				'Campo' => "#caja_mensaje",
				'Error' => "El mensaje debe tener al menos 10 caracteres.",
				'Div' => "#error_mensaje"
				);
	}
?>
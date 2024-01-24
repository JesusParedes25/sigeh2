<?php

	$hostname_localhost = "localhost";
	$username_localhost = "brian"; 
	$password_localhost = "Brimicab!";
	$database_localhost = "data_sigeh";

	/*$conexion = new mysqli($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);*/
	$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	mysqli_set_charset($conexion, 'utf8');

	if ($conexion->connect_error) {
		die("La conexion falló jajaja: " . $conexion->connect_error);
	}
?>

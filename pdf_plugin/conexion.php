
<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","oscar","osocerdo","sia"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida, Sorry : ', mysqli_connect_error();
		exit();
	}
?>

<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","brian","Brimicab!","data_sigeh"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida Men : ', mysqli_connect_error();
		exit();
	}
?>
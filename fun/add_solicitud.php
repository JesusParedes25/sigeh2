<?php
error_reporting(0);
	include('conexion_s.php');
	date_default_timezone_set('America/Mazatlan');


	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$dep = $_POST['dependencia'];
	$correo = $_POST['mail'];
	$estatus = '1';
	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
	$folio = 'SigF'.substr(str_shuffle($caracteres), 0, 5);
	$producto = $_POST['producto'];
	$prioridad = $_POST['prioridad'];
	$desc = $_POST['descripcion'];
	

	$sql = "INSERT INTO solicitudes24 (`id`,`dependencia`, `correo`, `estatus`, `producto`, `prioridad`, `descripcion`, `folio`, `fecha`, `hora`)
			VALUES('','$dep', '$correo','$estatus', '$producto', '$prioridad', '$desc', '$folio', '$fecha', '$hora')";
	//echo $sql;
	$link = mysqli_query($conn,$sql);
	

	
	if ($link->error) {
		function function_alert_($message) {      
                    // Display the alert box 
                    echo "<script>alert('$message'); window.location.href = '../index.html';</script>";
                    return (0);
                } 
                    // Function call
                    function_alert_("Ocurrió algún error en tu solicitud. No pudo guardarse.");

	}
	else {

			$token = "6380628644:AAEYg1zc5omFrjoSufmSkFAYdSO_ZXnxVOs";

			$datos = [
			    #'chat_id' => '1092053437',
			    'chat_id' => '6387208822',
			    'text' => 'Recibimos una solicitud en el SIGEH [Enlace](http://sigeh.hidalgo.gob.mx/fpdf/pdf_evidencias/pdf_solicitud.php)',
			    'parse_mode' => 'MarkdownV2' #formato del mensaje
			];
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$r_array = json_decode(curl_exec($ch), true);

			curl_close($ch);

		function function_alert1_($message1) {      
                    // Display the alert box 

                    echo "<script>
                  
                    alert('$message1');
                    </script>";


                } 
                    // Function call
                    function_alert1_("Solicitud guardada con exito!!");
	}

	mysqli_close($conn);

?>

<script type="text/javascript">
	 //window.open = ('../../fpdf/pdf_evidencias/pdf_solicitud.php','_blank');
	window.location.href = '../fpdf/pdf_evidencias/pdf_solicitud.php';
	//window.location.href = '../../index.php';
	//$("#contenido").load( "covid/view_list_cov.php");
</script>
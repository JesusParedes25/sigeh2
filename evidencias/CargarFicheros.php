<?php
 	$id_tactico = $_POST['id_tactico'];
   $id_usuario = $_POST['usuario'];
   $file_path = 'subidas/'.$id_usuario.'/'.$id_tactico.'';
   //echo $id_tactico;
   //echo $file_path;
// Cómo subir el archivo
$fichero = $_FILES["file"];
$archivo = $fichero["name"];


// Cargando el fichero en la carpeta "subidas"
//move_uploaded_file($fichero["tmp_name"], "subidas/".$fichero["name"]);

if (!file_exists($file_path)) {
              
                // Create a new file or direcotry
                mkdir($file_path, 0777, true);                       
            }
           
                if (move_uploaded_file($fichero["tmp_name"], $file_path.'/'.$fichero["name"])){
                  //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod($file_path.'/'.$fichero["name"], 0777);
                } 
                 else {
                function function_alert_($message) {      
                    // Display the alert box 
                    echo "<script>alert('$message');</script>";
                } 
                    // Function call
                    function_alert_("Ocurrió algún error al subir la evidencia. No pudo guardarse."); 
                     $archivo = ''; 
            }

// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>
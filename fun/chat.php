<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');
                                                                    
$token = "6380628644:AAEYg1zc5omFrjoSufmSkFAYdSO_ZXnxVOs";

$datos = [
    #'chat_id' => '1092053437',
    'chat_id' => '6387208822',
    'text' => 'Recibimos una solicitud en el SIGEH [Enlace](http://sigeh.hidalgo.gob.mx/pdf_plugin/pdf_evidencias/pdf_solicitud_telegram.php)',
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
if ($r_array['ok'] == 1) {
    echo "Mensaje enviado.";
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}
?>
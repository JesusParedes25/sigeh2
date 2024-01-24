<?php
$hostname = "localhost";
$username = "brian";
$password = "Brimicab!";
$database = "data_sigeh";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//mysqli_close($conn);
?>

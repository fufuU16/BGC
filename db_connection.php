<?php
$servername = "bgcdb.mysql.database.azure.com";
$username = "judymalahay";
$password = "Malahayj123";
$database = "bgc_database";
$port = 3306;

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "/home/site/wwwroot/certs/DigiCertGlobalRootCA.crt.pem", NULL, NULL);

if (!mysqli_real_connect($conn, $servername, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . mysqli_connect_error());
} 

echo "Connected successfully with SSL";
?>

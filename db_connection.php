<?php
// Initialize MySQLi
$conn = mysqli_init();

// Set SSL for secure transport
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Establish secure connection
$conn->real_connect(
    'bgcdb.mysql.database.azure.com', // Host
    'judymalahay',                    // Username
    'Malahayj123',                    // Password
    'bgc_database',                   // Database
    3306                              // Port
);

// Check connection
if ($conn->connect_errno) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    echo 'Connection successful!';
}

// Optional: Enable better error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

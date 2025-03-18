<?php
// Database configuration
$conn = mysqli_init(); // Initialize MySQLi connection

// Enable SSL
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Establish connection
$conn->real_connect(
    'bgcdb.mysql.database.azure.com', // Host
    'judymalahay',                    // Username
    'Malahayj123',                    // Password
    'bgc_database',                   // Database
    3306,                             // Port
    MYSQLI_CLIENT_SSL                 // Flags for SSL
);

// Check connection
if ($conn->connect_errno) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    echo 'Connection successful!';
}

// Optional: Enable exception mode for better error handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

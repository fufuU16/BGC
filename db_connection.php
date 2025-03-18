<?php
// Database configuration
$conn = new mysqli(
    'bgcdb.mysql.database.azure.com', // Host
    'judymalahay',                    // Username
    'Malahayj123',                    // Password
    'bgc_database',                   // Database
    3306,                             // Port
    null,                             // Socket
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

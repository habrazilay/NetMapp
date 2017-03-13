<?php

// include the configs / constants for the database connection and schema
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;

mysqli_close($conn);
?>
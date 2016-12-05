<?php
//Development Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "ims"; //Name of Database
$db_user = "xmlproject"; //Name of database user
$db_pass = "ims12345"; //Password for database user
$db_table_prefix = ""; // if the table prefix exists use this variable as a global

global $mysqli;

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else {
   //echo "Connection Successful!";
}

?>
<?php
// Database credentials
define('DB_SERVER', 'localhost');   // replace with your database server (usually 'localhost')
define('DB_USERNAME', 'root'); // replace with your database username
define('DB_PASSWORD', ''); // replace with your database password
define('DB_NAME', 'cenrodata');         // replace with your database name

// Attempt to connect to the database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>

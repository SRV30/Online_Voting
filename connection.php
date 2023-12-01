<?php
$host = "localhost";
$username = "root";
$pwd = "";
$database = "iElection";

$connection = new mysqli($host, $username, $pwd, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
 else {
    
}


?>
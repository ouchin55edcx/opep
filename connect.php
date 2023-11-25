<?php
$host = "localhost";
$dbname = "root";
$username = "test1";
$password = "";

// Create a connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
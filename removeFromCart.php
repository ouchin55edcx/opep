<?php
session_start();


    $host = "localhost";
    $dbname = "test1";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

     $id = $_POST['cartId'];

    // Check if the item belongs to the logged-in user
    $sql="DELETE FROM cart WHERE id = $id";
    $mysqli->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>


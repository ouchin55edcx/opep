<?php
include("connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt ="DELETE FROM products WHERE productID = $id";
    $result = mysqli_query($con, $stmt);
        if ($stmt) {
           header("location:index.php");
        } else {
            die("Error executing delete query: " . $stmt);
        }
    }

?>
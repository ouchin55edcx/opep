<?php
include("connect.php");

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $stmt ="DELETE FROM category WHERE category_ID = $id";
    $result = mysqli_query($con, $stmt);
        if ($stmt) {
            header("location:category.php");
        } else {
            die("Error executing delete query: " . $stmt);
        }
    }

?>

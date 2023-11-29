<?php
include './connect.php';
$idUser = $_GET['id'];
$sql = "DELETE FROM cart WHERE userId = $idUser";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
<?php
   
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    $quantity = 1; 
    $host = "localhost";
    $dbname = "test1";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    session_start(); 

    $insertQuery = "INSERT INTO cart (product_id, quantity, userId) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);

    if ($stmt) {
        $stmt->bind_param("iii", $productId, $quantity, $_SESSION['userId']);
        $stmt->execute();
        $stmt->close();

        $productResult = $mysqli->query("SELECT * FROM plante WHERE id = $productId");


        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error in prepared statement.";
    }

    $mysqli->close();
} else {
    echo "Product ID not provided.";
}
?>

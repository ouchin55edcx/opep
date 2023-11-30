<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {
    // Retrieve category name
    $productName=$_POST["productName"];
    $productCategory = $_POST["productCategory"];
    $productDescription=$_POST["productDescription"];
    $productPrice=$_POST["productPrice"];

    // Handle image upload
    $uploadDir = "uploads/category_images/";
    $uploadFile = $uploadDir . basename($_FILES["productImage"]["name"]);

    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $uploadFile)) {

        $imagePath = $uploadFile; // Store the file path in the database

        // Insert into the database
        $stmt = $mysqli->prepare("INSERT INTO plante (plt_name, description, prix, image, categorieID) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters and execute the statement
        $stmt->bind_param("ssisi", $productName, $productDescription, $productPrice, $imagePath, $productCategory);
 
        if ($stmt->execute()) {
            // Redirect back to the dashboard or wherever you want after insertion
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
} else {
    // If the form is not submitted, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}

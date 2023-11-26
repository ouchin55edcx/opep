<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

// Create a connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if (isset($_POST['deleteCategory'])) {
    // Get the category ID from the form
    $categoryId = $_POST['categoryId'];

    // Perform deletion in the database
    $deleteQuery = "DELETE FROM categorie WHERE id = ?";
    $stmt = $mysqli->prepare($deleteQuery);

    if ($stmt) {
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $stmt->close();

        // You can also delete related images or perform additional cleanup here if needed

        // Redirect back to the dashboard after deletion
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error preparing delete statement: " . $mysqli->error;
    }
} else {
    // If the form is not submitted, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}
?>
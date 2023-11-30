<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteProduct"])) {
    // Get the product ID from the form
    $productId = $_POST['productId'];

    // Perform deletion in the database
    $deleteQuery = "DELETE FROM plante WHERE id = ?";
    $stmt = $mysqli->prepare($deleteQuery);

    if ($stmt) {
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $stmt->close();

        // Redirect back to the dashboard after deletion
        header("Location: dashboard.php#products");
        exit();
    } else {
        echo "Error preparing delete statement: " . $mysqli->error;
    }
} else {
    // If the form is not submitted, redirect to the dashboard
    header("Location: dashboard.php#products");
    exit();
}
?>

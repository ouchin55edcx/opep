<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['editCategory'])) {
    $categoryId = $_POST['adminCategoryId'];
    $nameCtg = $_POST['categoryName'];

    // Check if a new image is provided
    if ($_FILES["categoryImage"]["size"] > 0) {
        // Handle image upload
        $uploadDir = "uploads/category_images/";
        $uploadFile = $uploadDir . basename($_FILES["categoryImage"]["name"]);

        if (move_uploaded_file($_FILES["categoryImage"]["tmp_name"], $uploadFile)) {
            // New image uploaded successfully
            $imagePath = $uploadFile; // Store the file path in the database
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        // No new image provided, keep the existing image
        $result = $mysqli->query("SELECT ctg_img_path FROM categorie WHERE id = $categoryId");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['ctg_img_path'];
        } else {
            echo "Category not found.";
            exit();
        }
    }

    // Check if a new name is provided
    if (empty($nameCtg)) {
        // No new name provided, keep the existing name
        $result = $mysqli->query("SELECT ctg_name FROM categorie WHERE id = $categoryId");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nameCtg = $row['ctg_name'];
        } else {
            echo "Category not found.";
            exit();
        }
    }

    // Update the database
    $stmt = $mysqli->prepare("UPDATE categorie SET ctg_name = ?, ctg_img_path = ? WHERE id = ?");

    // Bind parameters and execute the statement
    $stmt->bind_param("ssi", $nameCtg, $imagePath, $categoryId);
    $stmt->execute();

    // Redirect back to the dashboard after update
    header("Location: dashboard.php");
    exit();
} else {
    // If the form is not submitted, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}
?>

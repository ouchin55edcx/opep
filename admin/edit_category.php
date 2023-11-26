<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['editCategory'])) {
    $categoryId = $_POST['adminCategoryId'];
    $nameCtg = $_POST['categoryName'];

    // Handle image upload
    $uploadDir = "uploads/category_images/";
    $uploadFile = $uploadDir . basename($_FILES["categoryImage"]["name"]);

    if (move_uploaded_file($_FILES["categoryImage"]["tmp_name"], $uploadFile)) {
        // Image uploaded successfully
        // Insert data into the database
        $imagePath = $uploadFile; // Store the file path in the database

        // Update the database
        $stmt = $mysqli->prepare("UPDATE categorie SET ctg_name = ?, ctg_img_path = ? WHERE id = ?");

        // Bind parameters and execute the statement
        $stmt->bind_param("ssi", $nameCtg, $imagePath, $categoryId);
        $stmt->execute();

        // Redirect back to the dashboard after update
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error uploading file.";
    }
} else {
    // If the form is not submitted, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}
?>

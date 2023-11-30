<?php
$host = "localhost";
$dbname = "test1";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['editProduct'])) {
    $productId = $_POST['editProductID'];
    $productName = $_POST['editProductName'];
    $productDescription = $_POST['editProductDescription'];
    $productPrice = $_POST['editProductPrice'];
    $productCategory = $_POST['editProductCategory'];

    // Check if a new image is provided
    if ($_FILES["editProductImage"]["size"] > 0) {
        $uploadDir = "uploads/category_images/";
        // Create the directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadFile = $uploadDir . basename($_FILES["editProductImage"]["name"]);
        // echo $uploadFile;
        // exit;

        if (move_uploaded_file($_FILES["editProductImage"]["tmp_name"], $uploadFile)) {
            $imagePath = $uploadFile;
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        $result = $mysqli->query("SELECT `image` FROM plante WHERE id = $productId");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['image'];
        } else {
            echo "Product not found.";
            exit();
        }
    }

    $stmt = $mysqli->prepare("UPDATE plante SET plt_name = ?, description = ?, prix = ?, image = ?, categorieID = ? WHERE id = ?");
    $stmt->bind_param("ssissi", $productName, $productDescription, $productPrice, $imagePath, $productCategory, $productId);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
?>

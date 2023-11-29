<?php
// Check if the product ID is provided
   
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    $quantity = 1; 
    $host = "localhost";
    $dbname = "test1";
    $username = "root";
    $password = "";

    // Connect to the 
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    session_start(); 
  

    // Insert the product into the 'cart' table
    $insertQuery = "INSERT INTO cart (product_id, quantity, userId) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);

    if ($stmt) {
        $stmt->bind_param("iii", $productId, $quantity, $_SESSION['userId']);
        $stmt->execute();
        $stmt->close();

        // Fetch product details based on the product_id and display it in the slider
        $productResult = $mysqli->query("SELECT * FROM plante WHERE id = $productId");

        // if ($productResult->num_rows > 0) {
        //     $product = $productResult->fetch_assoc();
        //     echo "Product added to cart successfully!";

        //     // Display the product details in the slider
        //     echo '<div class="border-b mb-4 pb-4">';
        //     echo '<p class="text-gray-700">' . $product['plt_name'] . ' - Quantity: ' . $quantity . '</p>';
        //     echo '<form method="post" action="removeFromCart.php">';
        //     echo '<input type="hidden" name="cartItemId" value="' . $productId . '">';
        //     echo '<button class="text-red-500 hover:text-red-700" type="submit" name="removeFromCart">Remove</button>';
        //     echo '</form>';
        //     echo '</div>';
        // } else {
        //     echo "Error fetching product details.";
        // }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error in prepared statement.";
    }

    // Close the database connection
    $mysqli->close();
} else {
    // Handle the case where the product ID is not provided
    echo "Product ID not provided.";
}
?>

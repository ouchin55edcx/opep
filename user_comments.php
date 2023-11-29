<?php
session_start();

// Assuming the user ID is passed to this page as a parameter, for example, user_comments.php?userId=39
if (isset($_SESSION['userId'])) {

    $host = "localhost";
    $dbname = "test1";
    $username = "root";
    $password = "";

    // Create a connection
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $userId = $_SESSION['userId'];

    // Fetch user information
    $userQuery = "SELECT * FROM users WHERE id = ?";
    $userStmt = $mysqli->prepare($userQuery);

    if ($userStmt) {
        $userStmt->bind_param("i", $userId);
        $userStmt->execute();

        $userResult = $userStmt->get_result();

        if ($userResult->num_rows > 0) {
            $user = $userResult->fetch_assoc();

            // Header
            echo '
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>User Cart</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
            </head>

            <body class="bg-gray-100">
                <header class="bg-blue-500 text-white p-4">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-semibold">User Cart</h1>
                        <p class="text-sm">Welcome, ' . $user['firstName'] . ' | <a href="logout.php" class="underline">Logout</a></p>
                    </div>
                </header>
                <div class="container mx-auto mt-8">
            ';

            echo '<h2 class="text-3xl font-semibold mb-4">User Information</h2>';
            echo '<p class="text-gray-600">User ID: ' . $user['id'] . '</p>';
            echo '<p class="text-gray-600">Name: ' . $user['firstName'] . '</p>';
            echo '<p class="text-gray-600">Email: ' . $user['email'] . '</p>';
            echo '<a href="checkout.php?id='.$user['id'].'" class="bg-yellow-500 text-white px-4 py-2 rounded" type="submit" name="removeFromCart">checkOutt</a>';

        } else {
            echo '<p class="text-red-500">No user found for ID ' . $userId . '</p>';
        }

        $userStmt->close();

        // Fetch products in the user's cart
        $cartQuery = "SELECT product_id,userId,plt_name,description,quantity,prix,image, plante.id AS planteId,cart.id AS cartId FROM cart JOIN plante ON cart.product_id = plante.id WHERE userId = ?";
        $cartStmt = $mysqli->prepare($cartQuery);

        if ($cartStmt) {
            $cartStmt->bind_param("i", $userId);
            $cartStmt->execute();

            $cartResult = $cartStmt->get_result();

            if ($cartResult->num_rows > 0) {
                echo '<h2 class="text-3xl font-semibold mb-4">Products in Cart</h2>';
                while ($row = $cartResult->fetch_assoc()) {
                    echo '<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white m-4">';
                    echo '<img class="w-full h-48 object-cover" src="admin/' . $row['image'] . '" alt="Product Image">';
                    echo '<div class="px-6 py-4">';
                    echo '<p class="text-gray-700">Product ID: ' . $row['product_id'] . '</p>';
                    echo '<p class="text-gray-700">Product Name: ' . $row['plt_name'] . '</p>';
                    echo '<p class="text-gray-700">Quantity: ' . $row['quantity'] . '</p>';
                    echo '<p class="text-gray-900">Price: $' . $row['prix'] . '</p>';
                    echo '</div>';
                    echo '<div class="px-6 py-4">';
                    echo '<form method="post" action="removeFromCart.php">';
                    echo '<a href="removeFromCart.php?id='.$row['cartId'].'" class="bg-red-500 text-white px-4 py-2 rounded" type="submit" name="removeFromCart">Remove from Cart</a>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-gray-500">No products found in the cart for User ID ' . $userId . '</p>';
            }

            $cartStmt->close();
        } else {
            echo '<p class="text-red-500">Error in prepared statement for cart: ' . $mysqli->error . '</p>';
        }
    } else {
        echo '<p class="text-red-500">Error in prepared statement for user: ' . $mysqli->error . '</p>';
    }

    // Close the database connection
    $mysqli->close();

    // Closing HTML tags
    echo '</div></body></html>';
} else {
    echo '<p class="text-red-500">User ID not provided.</p>';
}
?>

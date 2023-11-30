<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .cart-item {
            width: 300px;
            margin: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cart-item h3 {
            margin: 0;
            color: #333;
        }

        .cart-item p {
            margin: 10px 0;
            color: #777;
        }

        .cart-item span {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <header>
        <h1>Shopping Cart</h1>
    </header>

    <main>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            // Display items in the shopping cart
            foreach ($_SESSION['cart'] as $item) {
                echo '<div class="cart-item">';
                echo '<h3>' . $item['name'] . '</h3>';
                echo '<p><span>Price:</span> $' . $item['price'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Your shopping cart is empty.</p>';
        }
        ?>
    </main>

</body>
</html>

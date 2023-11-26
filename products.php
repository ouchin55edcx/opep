<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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

        .product-card {
            width: 300px;
            margin: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-card h3 {
            margin: 0;
            color: #333;
        }

        .product-card p {
            margin: 10px 0;
            color: #777;
        }

        .product-card span {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <header>
        <h1>Products</h1>
    </header>

    <main>
        <?php
        $host = "localhost";
        $dbname = "test1";
        $username = "root";
        $password = "";

        $mysqli = new mysqli($host, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $result = $mysqli->query("SELECT * FROM plante WHERE categorieID = $categoryId");

            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '<img src="admin/' . $product['image'] . '" alt="Product Image">';
                    echo '<h3>' . $product['plt_name'] . '</h3>';
                    echo '<p>' . $product['description'] . '</p>';
                    echo '<p><span>Price:</span> $' . $product['prix'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found in this category.</p>';
            }
        } else {
            echo '<p>Invalid category ID.</p>';
        }

        $mysqli->close();
        ?>
    </main>

</body>
</html>

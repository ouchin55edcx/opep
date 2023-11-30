<?php
include'header.php';?>




    <main class="flex flex-wrap justify-around p-4">
        <?php
        $host = "localhost";
        $dbname = "test1";
        $username = "root";
        $password = "";

        $mysqli = new mysqli($host, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        session_start();
        // Check if a search query is provided
        if (isset($_GET['query'])) {
            $searchQuery = $_GET['query'];

            // Fetch products based on the search query
            $result = $mysqli->query("SELECT * FROM plante WHERE plt_name LIKE '%$searchQuery%'");

            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    echo '<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white m-4">';
                    echo '<img class="w-full h-48 object-cover" src="admin/' . $product['image'] . '" alt="Product Image">';
                    echo '<div class="px-6 py-4">';
                    echo '<div class="font-bold text-xl mb-2">' . $product['plt_name'] . '</div>';
                    echo '<p class="text-gray-700 text-base">' . $product['description'] . '</p>';
                    echo '<p class="text-gray-900 text-xl mt-2">$' . $product['prix'] . '</p>';
                    echo '<form method="post" action="addToCart.php">';
                    echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';
                    echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="submit" name="addToCart">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-xl text-center text-gray-700">No products found for the search query.</p>';
            }
        } else {
            // Display products from the specified category
            if (isset($_GET['category_id'])) {
                $categoryId = $_GET['category_id'];
                $result = $mysqli->query("SELECT * FROM plante WHERE categorieID = $categoryId");

                if ($result->num_rows > 0) {
                    while ($product = $result->fetch_assoc()) {
                        echo '<div class="max-w-sm w-80 h-96 rounded overflow-hidden shadow-lg bg-green-100 m-4">';
                        echo '<img class="w-full h-48 object-cover" src="admin/' . $product['image'] . '" alt="Product Image">';
                        echo '<div class="px-6 py-4">';
                        echo '<div class="font-bold text-xl mb-2">' . $product['plt_name'] . '</div>';
                        echo '<p class="text-gray-700 text-base">' . $product['description'] . '</p>';
                        echo '<p class="text-gray-900 text-xl mt-2">$' . $product['prix'] . '</p>';
                        echo '<form method="post" action="addToCart.php">';
                        echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';
                        echo '<button class="bg-orange-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="submit" name="addToCart">Add to Cart</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                }

            } else {
                echo '<p class="text-xl text-center text-gray-700">Invalid category ID.</p>';
            }
        }

        $mysqli->close();
        ?>
    </main>


</body>

</html>
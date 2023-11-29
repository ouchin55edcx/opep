<?php
$host = "localhost";
$dbname = "test1";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if a search query is provided
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Fetch products based on the search query
    $result = $mysqli->query("SELECT * FROM plante WHERE plt_name LIKE '%$searchQuery%'");

    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Search Results</title>';
    echo '<style>';
    echo 'body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }';
    echo 'header { background-color: #333; color: #fff; text-align: center; padding: 1em; }';
    echo '.search-results { display: flex; flex-wrap: wrap; justify-content: space-around; padding: 20px; }';
    echo '.product-card { width: 300px; margin: 20px; padding: 15px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; }';
    echo '.product-card img { max-width: 100%; border-radius: 5px; margin-bottom: 10px; }';
    echo '.product-card h3 { margin: 0; color: #333; }';
    echo '</style>';
    echo '</head>';
    echo '<body>';

    echo '<header>';
    echo '<h2>Search Results for "' . $searchQuery . '"</h2>';
    echo '</header>';

    echo '<div class="search-results">';

    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            // Display each product in a card-style layout
            echo '<div class="product-card">';
            echo '<img src="' . $product['image'] . '" alt="Product Image">';
            echo '<h3>' . $product['plt_name'] . '</h3>';
            echo '<p>' . $product['description'] . '</p>';
            echo '<p>Price: $' . $product['prix'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found for "' . $searchQuery . '"</p>';
    }

    echo '</div>';

    echo '</body>';
    echo '</html>';
} else {
    echo '<p>No search query provided.</p>';
}

$mysqli->close();
?>

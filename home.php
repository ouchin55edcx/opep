<?php

include 'header.php';

echo '
<body class="font-sans bg-gray-200">


    <main class="flex flex-wrap justify-around p-4">
    ';

$host = "localhost";
$dbname = "test1";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
session_start();

$result = $mysqli->query("SELECT * FROM categorie");

if ($result->num_rows > 0) {
    while ($category = $result->fetch_assoc()) {
        echo '<div class="max-w-xs rounded overflow-hidden shadow-lg m-4 bg-white">';
        echo '<a href="products.php?category_id=' . $category['id'] . '">';
        echo '<img class="w-full h-48 object-cover" src="admin/' . $category['ctg_img_path'] . '" alt="Category Image">';
        echo '<h3 class="text-lg text-gray-800">' . $category['ctg_name'] . '</h3>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo '<p class="text-gray-800">No categories found.</p>';
}

$mysqli->close();

echo '
    </main>

</body>
</html>
';
?>

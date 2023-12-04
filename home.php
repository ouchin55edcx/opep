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
        echo '<div class="max-w-md rounded overflow-hidden shadow-lg m-4 bg-white hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-2">';
        echo '<a href="products.php?category_id=' . $category['id'] . '" class="block h-full">';
        echo '<img class="w-full h-64 object-cover" src="admin/' . $category['ctg_img_path'] . '" alt="Category Image">';
        echo '<div class="p-6">';
        echo '<h3 class="text-xl text-gray-800 font-semibold mb-2">' . $category['ctg_name'] . '</h3>';
        echo '</div>';
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

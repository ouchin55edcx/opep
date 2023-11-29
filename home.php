<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        .category-card {
            width: 300px;
            margin: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .category-card img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .category-card h3 {
            margin: 0;
            color: #333;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to the Home Page</h1>
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
        session_start();

        $result = $mysqli->query("SELECT * FROM categorie");

        if ($result->num_rows > 0) {
            while ($category = $result->fetch_assoc()) {
                echo '<div class="category-card">';
                echo '<a href="products.php?category_id=' . $category['id'] . '">';
                echo '<img src="admin/' . $category['ctg_img_path'] . '" alt="Category Image">';
                echo '<h3>' . $category['ctg_name'] . '</h3>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No categories found.</p>';
        }

        $mysqli->close();
        ?>
    </main>

</body>
</html>

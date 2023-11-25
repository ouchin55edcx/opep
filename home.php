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
            /* background-image: url('admin/uploads/category_images/class.png'); */
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
        // Include your database connection code here

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



        // Fetch all categories from the database
        $result = $mysqli->query("SELECT * FROM categorie");

        // Check if there are any categories
        if ($result->num_rows > 0) {
            // Loop through each row (category) in the result set
            while ($category = $result->fetch_assoc()) {
                // Output HTML for each category card
                echo '<div class="category-card">';
                echo '<img src="admin/' . $category['ctg_img_path'] . '" alt="Category Image">';
                echo '<h3>' . $category['ctg_name'] . '</h3>';
                echo '</div>';
            }
        } else {
            // No categories found
            echo '<p>No categories found.</p>';
        }

        // Close the database connection
        $mysqli->close();
        ?>

    </main>

</body>
</html>

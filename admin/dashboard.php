<?php
$host = "localhost";
$dbname = "test1";  // Adjust this line
$username = "root";
$password = "";

// Create a connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


include("add_category.php"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        nav {
            background-color: #555;
            color: #fff;
            padding: 1em;
        }

        section {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #555;
            color: #fff;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <header>
        <h1>Dashboard</h1>
    </header>

    <nav>
        <a href="#categories">Categories</a> |
        <a href="#products">Products</a>
    </nav>

    <!-- Section for Managing Categories -->
    <section id="categories">
        <h2>Manage Categories</h2>

        <!-- Display Categories -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <!-- PHP code to fetch and display categories goes here -->
            <!-- Example: -->
            <!--
            <tr>
                <td>1</td>
                <td>Category Name</td>
                <td>[Category Image]</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            -->
        </table>

        <!-- Form to Add Category -->
        <!-- Add Category Form -->
        <form method="post" action="" enctype="multipart/form-data">
            <h3>Add Category</h3>

            <!-- Other category fields -->
            <label for="categoryName">Category Name:</label>
            <input type="text" id="categoryName" name="categoryName" required>

            <!-- Image upload -->
            <label for="categoryImage">Category Image:</label>
            <input type="file" id="categoryImage" name="categoryImage" accept="image/*" required>

            <button type="submit" name="addCategory">Add Category</button>
        </form>


    </section>

    <!-- Section for Managing Products -->
    <section id="products">
        <h2>Manage Products</h2>

        <!-- Display Products -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <!-- PHP code to fetch and display products goes here -->
            <!-- Example: -->
            <!--
            <tr>
                <td>1</td>
                <td>Product Name</td>
                <td>Product Description</td>
                <td>50</td>
                <td>[Product Image]</td>
                <td>Category Name</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            -->
        </table>

        <!-- Form to Add Product -->
        <form>
            <h3>Add Product</h3>
            <!-- PHP code to handle product addition goes here -->
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="productDescription">Product Description:</label>
            <textarea id="productDescription" name="productDescription" required></textarea>

            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" required>

            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage">

            <label for="productCategory">Product Category:</label>
            <!-- PHP code to fetch and populate categories in a dropdown goes here -->
            <select id="productCategory" name="productCategory" required>
                <!-- Options will be dynamically populated -->
            </select>

            <button type="submit">Add Product</button>
        </form>

    </section>

</body>

</html>
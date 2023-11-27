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

        .category-image {
            width: 100px;
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #555;
            color: #fff;
        }

        .category-card img {
            max-width: 50px;
            /* Adjust the max-width as needed */
            max-height: 50px;
            /* Adjust the max-height as needed */
            border-radius: 5px;
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

        .button-container {
            display: flex;
            justify-content: space-around;


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

        <!-- Form to Add Category -->
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

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <!-- PHP code to fetch and display categories goes here -->
            <?php
            // Fetch all categories from the database ordered by ID
            $result = $mysqli->query("SELECT * FROM categorie ORDER BY id ASC");

            // Check if there are any categories
            if ($result->num_rows > 0) {
                // Categories found, loop through each category
                while ($category = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $category['id'] . '</td>';
                    echo '<td>' . $category['ctg_name'] . '</td>';
                    echo '<td>';
                    echo '<img src="' . $category['ctg_img_path'] . '" alt="Category Image" class="category-image">';
                    echo '</td>';
                    echo '<td>';
                    echo '<form method="post" action="ctg_action.php">';
                    echo '<input type="hidden" name="categoryId" value="' . $category['id'] . '">';
                    echo '<div class="button-container">';
                    echo '<button type="submit" name="deleteCategory" class="btn-delete">Delete</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                // No categories found
                echo '<tr><td colspan="4">No categories found</td></tr>';
            }
            ?>
        </table>

        <!-- Edit Category Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <h3>Edit Category</h3>

                <form method="post" action="edit_category.php" enctype="multipart/form-data">

                    <label for="adminCategoryId">Enter Category ID:</label>
                    <input type="number" id="adminCategoryId" name="adminCategoryId" required>

                    <label for="editCategoryName">Category Name:</label>
                    <input type="text" id="editCategoryName" name="categoryName">

                    <label for="editCategoryImage">Category Image:</label>
                    <input type="file" id="editCategoryImage" name="categoryImage">

                    <button type="submit" name="editCategory">Save</button>
                </form>
            </div>
        </div>


    </section>

    <?php
    // ... (existing code)

    // Section for Managing Products
    echo '<section id="products">';
    echo '<h2>Manage Products</h2>';
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Description</th>';
    echo '<th>Price</th>';
    echo '<th>Image</th>';
    echo '<th>Category</th>';
    echo '<th>Action</th>';
    echo '</tr>';

    // Fetch and display products
    $result = $mysqli->query("SELECT * FROM plante");

    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $product['id'] . '</td>';
            echo '<td>' . $product['plt_name'] . '</td>';
            echo '<td>' . $product['description'] . '</td>';
            echo '<td>' . $product['prix'] . '</td>';
            echo '<td>';
            echo '<img src="' . $product['image'] . '" alt="Product Image" class="category-image">';
            echo '</td>';
            echo '<td>' . $product['categorieID'] . '</td>';
            echo '<td>';
            echo '<form method="post" action="edit_product.php">';
            echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';
            echo '<button type="submit" name="editProduct">Edit</button>';
            echo '</form>';
            echo '<form method="post" action="delete_product.php">';
            echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';
            echo '<button type="submit" name="deleteProduct">Delete</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">No products found</td></tr>';
    }

    ?>

    <!-- Section for Managing Products -->
    <section id="products">
            <!-- PHP code to fetch and display products goes here -->
        </table>

        <!-- Form to Add Product -->
        <form method="post" action="add_product.php" enctype="multipart/form-data">
            <h3>Add Product</h3>
            <!-- Other product fields -->
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>
            <label for="productDescription">Product Description:</label>
            <textarea id="productDescription" name="productDescription" required></textarea>
            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" required>

            <!-- Image upload for the product -->
            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" required>

            <!-- Dropdown for product category -->
            <label for="productCategory">Product Category:</label>
            <select id="productCategory" name="productCategory" required>
                <?php
                // Fetch all categories from the database ordered by ID
                $result = $mysqli->query("SELECT * FROM categorie ORDER BY id ASC");

                // Check if there are any categories
                if ($result->num_rows > 0) {
                    // Categories found, loop through each category
                    while ($category = $result->fetch_assoc()) {
                        echo '<option value="' . $category['id'] . '">' . $category['ctg_name'] . '</option>';
                    }
                } else {
                    // No categories found
                    echo '<option value="" disabled>No categories found</option>';
                }
                ?>
            </select>

            <button type="submit" name="addProduct">Add Product</button>
        </form>

    </section>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <h3>Edit Product</h3>
            <form method="post" action="edit_product.php" enctype="multipart/form-data">
                <label for="editProductName">Product Name:</label>
                <input type="text" id="editProductName" name="editProductName" required>
                <label for="editProductDescription">Product Description:</label>
                <textarea id="editProductDescription" name="editProductDescription" required></textarea>
                <label for="editProductPrice">Product Price:</label>
                <input type="number" id="editProductPrice" name="editProductPrice" required>
                <label for="editProductImage">Product Image:</label>
                <input type="file" id="editProductImage" name="editProductImage">
                <label for="editProductCategory">Product Category:</label>
                <select id="editProductCategory" name="editProductCategory" required>
                    <!-- Fetch and display categories here -->
                </select>
                <button type="submit" name="saveProductChanges">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ... (existing code)

            // Get all elements with class 'btn-delete'
            var deleteButtons = document.querySelectorAll('.btn-delete');

            // Loop through each 'Delete' button and attach a click event listener
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the product ID from the 'data-product-id' attribute
                    var productId = button.getAttribute('data-product-id');

                    // You can implement the deletion logic here, e.g., using AJAX
                });
            });
        });
    </script>

</body>

</html>

</body>

</html>
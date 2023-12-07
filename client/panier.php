<?php
include("../admin/head.php");
include("../admin/connect.php");
include("header.php");
session_start();
$userId = $_SESSION['userID'];
if ($userId == null || !$userId) {
    header('location: ../sgining/login.php');
} else {

    // Check if the form is submitted to add the product to the cart
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
        $productId = $_POST["product_id"];

        $result = mysqli_query($con, "SELECT * FROM panier WHERE user_id = $userId AND plant_id = $productId");
        $row = mysqli_fetch_assoc($result);

        if ($row == null) {
            // Insert the product information into the panier table
            $insertQuery = "INSERT INTO panier (user_id, plant_id) VALUES ($userId, $productId)";
            if (mysqli_query($con, $insertQuery)) {
                header("location:./panier.php");
            }
        } else {
            // Update the product information into the panier table
            $panierId = $row["panier_id"];
            $quantity = $row["quantity"];
            $quantity++;
            $insertQuery = "UPDATE `panier` SET `quantity`= $quantity WHERE `panier_id` = $panierId";
            if (mysqli_query($con, $insertQuery)) {
                header("location:./panier.php");
            }
        }
    }

    if (isset($_GET['delete'])) {
        $deleteId = $_GET['delete'];
        $insertQuery = "DELETE FROM `panier` WHERE `panier_id`=$deleteId";
        if (mysqli_query($con, $insertQuery)) {
            header("location:./panier.php");
        }
    }

    if (isset($_GET['checkout'])) {
        $insertQuery = "DELETE FROM `panier` WHERE `user_id`=$userId";
        if (mysqli_query($con, $insertQuery)) {
            header("location:./panier.php");
        }
    }

?>

    <h1 class="font-bold text-6xl text-center">Products in Panier</h1>
    <a href='./panier.php?checkout'>
        <button class='focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800'>CheckOut</button>
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <?php
        $row='';
        $result = mysqli_query($con, "SELECT panier.*, products.* 
                                  FROM panier 
                                  JOIN products ON panier.plant_id = products.productID
                                  WHERE panier.user_id = $userId");

        while ($row = mysqli_fetch_array($result)) {
            echo "
        <center>
        <main>
            <div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'>
                <a href='#'>
                    <img class='rounded-t-lg' src={$row['image']}  />
                </a>
                <div class='p-5'>
                    <a href='#'>
                        <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white'>{$row['product_name']}</h5>
                    </a>
                    <span>{$row['quantity']}</span>
                    <p class='mb-3 font-normal text-gray-700 dark:text-gray-400'>{$row['price']} $</p>
                </div>
                <a href='./panier.php?delete={$row['panier_id']}'>
                    <button class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800'>Delete</button>
                </a>
            </div>
    
        </main>
    </center> ";
        }
        ?>
    </div>
<?php
}
?>
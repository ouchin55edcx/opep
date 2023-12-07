<?php
include("../admin/head.php");
include("../admin/connect.php");
include("header.php");
?>

<h1 class="font-bold text-6xl text-center">Our Product</h1>
    
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //searsh
    $search = $_POST['search'];
    $query = "SELECT * FROM products  WHERE product_name LIKE '%$search%'";
    $result = mysqli_query($con, $query); 

} else{
    $result = mysqli_query($con, "SELECT * FROM products");
}

?>
 
 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <center>
        <main>
            <div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'>
                <a href='#'>
                    <img class='rounded-t-lg' src=$row[image]  />
                </a>
                <div class='p-5'>
                    <a href='#'>
                        <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white'>$row[product_name]</h5>
                    </a>
                    <p class='mb-3 font-normal text-gray-700 dark:text-gray-400'>$row[price] $</p>
                    <form method='post' action='panier.php'>
                    <input type='hidden' name='product_id' value='$row[productID]'>
                    <button type='submit' name='add_to_cart' class='focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800'>Add To Cart</button>
                </form>
                </div>
            </div>
    
        </main>
    </center> ";
   }
    ?>
</div>







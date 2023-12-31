<?php
include("../admin/head.php");
include("../admin/connect.php");
include("header.php");
?>
<div class='max-w-md mx-auto'>
    <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
        <form action="" method="post">
            <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" name="search" placeholder="Search something.." />
            <button type="submit">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </button>
        </form>
    </div>
</div>

<section>

    <div class="bg-cover bg-center h-full" style="background-image: url('imagepexels-ameruverse-digital-marketing-media-1477166.jpg');">
        <div class="bg-black bg-opacity-50 text-white text-center py-10">
            <h2 class="text-4xl font-bold mb-4">Discover Our Stunning Plants</h2>
            <p class="text-lg">Explore a variety of beautiful and unique plants to enhance your space.</p>
        </div>
    </div>

</section>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //searsh
    $search = $_POST['search'];
    $query = "SELECT * FROM products  WHERE product_name LIKE '%$search%'";
    $result = mysqli_query($con, $query);
} else {
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
<?php
include("../admin/head.php");
include("../admin/connect.php");
include("header.php");
include("hero_section.php");

?>

<section>
<div class="bg-red-500 p-5 m1-0"><h1 class="font-bold text-6xl text-center text-white">Our Categorie</h1>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    <?php
    $result = mysqli_query($con, "SELECT * FROM category");
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <div class='category-card group relative overflow-hidden text-base sm:text-sm bg-white border rounded-md border-gray-300 shadow-md transition-transform transform hover:scale-105 mt-10'>
            <div class='category-content p-4'>
                <h3 class='category-title text-lg font-semibold text-gray-800 mb-2'>
                    {$row['category_name']}
                </h3>
                <a href='display_p.php?id={$row['category_ID']}' class='view-products-btn inline-block px-4 py-2 text-sm font-medium leading-5 text-white uppercase transition bg-green-500 border border-transparent rounded-md hover:bg-green-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-800'>
                    View Products
                </a>
            </div>
        </div>";
    }
    ?>
</div>
</section>

<!-- populaire product -->

<section class="bg-pink-300 ">
<div class="bg-red-500 p-5 m1-0">   <h1 class="text-6xl font-bold text-white text-center"> Our Populaire Products </h1>
</div>
<div class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

    <?php
    $result = mysqli_query($con, "SELECT * FROM products  LIMIT 3");
    
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <center>
        <main>
            <div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'>
                <a href='#'>
                    <img class='rounded-t-lg' src='{$row['image']}' alt='{$row['product_name']}' />
                </a>
                <div class='p-5'>
                    <a href='#'>
                        <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white'>{$row['product_name']}</h5>
                    </a>
                    <p class='mb-3 font-normal text-gray-700 dark:text-gray-400'>{$row['price']} $</p>
                    <form method='post' action='panier.php'>
                        <input type='hidden' name='product_id' value='{$row['productID']}'>
                        <button type='submit' name='add_to_cart' class='focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800'>Add To Cart</button>
                    </form>
                </div>
            </div>
        </main>
    </center> ";
    }
    ?>
</div>
</section>


<?php 

include("footer.php");


?>




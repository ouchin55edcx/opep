<?php
include("../admin/head.php");
include("../admin/connect.php");
include("header.php");
?>


<h1 class="font-bold text-6xl text-center">Our Categorie</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    <?php
    $result = mysqli_query($con, "SELECT * FROM category");
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <div class='category-card group relative overflow-hidden text-base sm:text-sm'>
            <div class='category-image aspect-h-1 aspect-w-1 overflow-hidden bg-gray-100 group-hover:opacity-75'>
            <img src='../test.jpg' alt=''>
            </div>
            <div class='category-content'>
                <a href='display_p.php?id={$row['category_ID']}' class='category-title block font-medium text-gray-900'>
                    {$row['category_name']}
                </a>
                <p class='category-description mt-1'> View more about  {$row['category_name']} plants</p>
            </div>
        </div>";
    }
    ?>
</div>

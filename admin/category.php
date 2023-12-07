<?php
include("head.php");
include("header.php");
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST["category_name"];

    $insert = "INSERT INTO category (category_name) VALUES ('$category_name')";
    $result = mysqli_query($con, $insert);

    if ($result) {
        header("Location: category.php");
        exit(); 
    } else {
        echo "Error adding category: " . mysqli_error($con);
    }
}


?>

<section class="flex-col absolute justify-center right-[30%] top-16">
    <h1 class="text-xl text-center font-bold text-white capitalize dark:text-white">Add category</h1>

    <form action="category.php" method="post">
        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="category_name">Category Name</label>
                <input type="text" name="category_name" class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Add Category</button>
            </div>
        </div>
    </form>
</section>




<?php
$display = $con->query("SELECT * FROM category ORDER BY category_ID ASC");

if ($display->num_rows > 0) {
    echo '<div class="relative overflow-x-auto my-52 mx-[115px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Name
                </th>
                <th scope="col" class="px-10 py-3 w-full">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>';

        while ($category = $display->fetch_assoc()) {
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">';
            echo '<td class="py-2 px-4 border-b">' . $category['category_ID'] . '</td>';
            echo '<td class="py-2 px-4 border-b">' . $category['category_name'] . '</td>';
            echo '<td class="py-2 px-4 border-b">
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="delete.php?delete_id=' . $category['category_ID'] . '">Delete</a>
                    </button>
                    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <a href="edit_cat.php?id=' . $category['category_ID'] . '">Edit</a>
                    </button>
                </td>'; 
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        } else {
        echo '<p class="mt-4 text-white">No categories found</p>';
        }
        
?>

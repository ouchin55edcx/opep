<?php
include("head.php");
include("header.php");
include("connect.php");

// Check if ID is set and fetch category data for editing
if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $result = $con->prepare("SELECT * FROM category WHERE category_ID = ?");
    $result->bind_param("i", $edit_id);
    $result->execute();
    $category = $result->get_result()->fetch_assoc();
}

// Update category if the form is submitted
if (isset($_POST["submit"])) {
    $edit_id = $_GET['id'];
    $name = $_POST["category_name"];

    // Check if editing an existing category
    if (isset($edit_id)) {
        // Editing existing category
        $update = $con->prepare("UPDATE category SET category_name=? WHERE category_ID=?");
        $update->bind_param("si", $name, $edit_id);
        $update->execute();
        header("location: ./category.php");
    }
}

?>

<section class="flex-col absolute justify-center right-[30%] top-16">
    <h1 class="text-xl text-center font-bold text-white capitalize dark:text-white">Edit category</h1>

    <form class="" id="editForm" action="edit_cat.php?id=<?=$edit_id?>" method="POST" enctype="multipart/form-data">
        <div class="">
            <div>
                <label class="text-white dark:text-gray-200" for="username">Category name</label>
                <input name="category_name" type="text" class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" value="<?php echo isset($category['category_name']) ? $category['category_name'] : ''; ?>">
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" name="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </div>
    </form>


</section>

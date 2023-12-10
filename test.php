<?php
include("admin/connect.php");

if (isset($_POST['submit'])) {
    $temporire_location = $_FILES['img']['tmp_name'];
    $image_name = $_FILES['img']['name'];
    $image_up = "./zida/".$image_name ; 

    // Move uploaded file to the destination directory
    if (move_uploaded_file($temporire_location, $image_up)) {
        echo "Image added successfully";
    } else {
        echo "Handle file upload failure";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Image Upload Form</title>
</head>

<body>
    <form action="test.php" method="post" enctype="multipart/form-data">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="img" type="file">

        <button type="submit" name="submit">Save</button>
    </form>
</body>

</html>

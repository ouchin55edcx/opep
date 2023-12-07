<?php

include("head.php");
include("header.php");
include("connect.php");
if (isset($_POST['edit'])) {
    $id_product = $_POST['productId'];
    $name = $_POST["product_name"];
    $price = $_POST["price"];
    $category_ID = intval($_POST['category_id']);
    $image=$_FILES['image'];
    $image_location = $image['tmp_name'];
    $image_name = $image['name'];
   
    if ($image_name='') {
      $sql = $con->prepare("UPDATE `products` SET `product_name`=?,`price`=?,`category_ID`=? WHERE `productID`=?");
      $sql->bind_param("siii", $name, $price, $category_ID,$id_product);
    } else {
      $image_up = "../client/image" . $image_name;
      move_uploaded_file($image_location, $image_up);
      $sql = $con->prepare("UPDATE `products` SET `product_name`=?,`price`=?,`image`=?,`category_ID`=? WHERE `productID`=?");
      $sql->bind_param("sisii", $name, $price, $image_up, $category_ID,$id_product);
    }
      $sql->execute();
}
if (isset($_GET["id"])) { 
  $id = $_GET["id"];
  $result = $con->query("SELECT * FROM products WHERE productID = $id");
  $products = $result->fetch_assoc(); 
  // var_dump($products);
  $result = $con->query("SELECT * FROM category");
  $categories = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  <div class="flex-col justify-center gap-10 mx-96">
    <section class="">
      <h1 class="text-xl text-center font-bold text-white capitalize dark:text-white">EDIT PRODUCT</h1>
      <form class="" action="index.php" method="POST" enctype="multipart/form-data">
        <div class="">
          <div>
            <label class="text-white dark:text-gray-200" for="username">Product name</label>
            <input value="<?=$products["product_name"]?>" name="product_name" type="text" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            <input value="<?=$products["productID"]?>" name="productId" type="hidden">
          </div>
          <div>
            <label class="text-white dark:text-gray-200">Product Price</label>
            <input value="<?=$products["price"]?>" name="price" type="number" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
          </div>
          <div>
            <label class="text-white dark:text-gray-200" for="passwordConfirmation">Category</label>
            <select name="category_id" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
              <?php
  
              foreach ($categories as $category) {?>
  
                <option <?php if($products["category_ID"] == $category["category_ID"]){echo 'selected';}?> value='<?= $category["category_ID"]  ?>'><?= $category["category_name"] ?></option>
              <?php  } ?>
  
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-white">
              Product Image
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <div class="flex text-sm text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span class="">Upload a file</span>
                    <input id="file-upload" name="image" type="file" class="sr-only">
                  </label>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
        <div class="flex justify-center items-center mt-6">
          <button name="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
      </form>
    </section>
  <?php
} else {
  $result = $con->query("SELECT * FROM category ORDER BY category_ID ASC");
  $categories = $result->fetch_all(MYSQLI_ASSOC);
  if (isset($_POST["submit"])) {
  
    $name = $_POST["product_name"];
    $price = $_POST["price"];
    $category_ID = intval($_POST['category_id']);
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "../client/image" . $image_name;
  
  
    if (move_uploaded_file($image_location, $image_up)) {
  
      $insert = $con->prepare("INSERT INTO products (product_name, price, image, category_ID) VALUES (?, ?, ?, ?)");
      $insert->bind_param("sisi", $name, $price, $image_up, $category_ID);
  
      if ($insert->execute()) {
        echo " ";
      }
    } else {
      echo " ";
    }
  } else {
    echo "  ";
  }
  ?>
  
  
  <div class="flex-col justify-center gap-10 mx-96">
    <section class="">
      <h1 class="text-xl text-center font-bold text-white capitalize dark:text-white">ADD PRODUCT</h1>
      <form class="" action="index.php" method="POST" enctype="multipart/form-data">
        <div class="">
          <div>
            <label class="text-white dark:text-gray-200" for="username">Product name</label>
            <input name="product_name" type="text" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
          </div>
          <div>
            <label class="text-white dark:text-gray-200">Product Price</label>
            <input name="price" type="number" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
          </div>
          <div>
            <label class="text-white dark:text-gray-200" for="passwordConfirmation">Category</label>
            <select name="category_id" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
              <?php
  
              foreach ($categories as $category) { ?>
  
                <option value='<?php echo $category["category_ID"]  ?>'><?= $category["category_name"] ?></option>
              <?php  } ?>
  
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-white">
              Product Image
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <div class="flex text-sm text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span class="">Upload a file</span>
                    <input id="file-upload" name="image" type="file" class="sr-only">
                  </label>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
        <div class="flex justify-center items-center mt-6">
          <button name="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
      </form>
    </section>
  
    <!-- table -->
    <div class="overflow-x-auto max-h-screen mt-10">
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b bg-gray-200">Product Name</th>
            <th class="py-2 px-4 border-b bg-gray-200">Price</th>
            <th class="py-2 px-4 border-b bg-gray-200">Category</th>
            <th class="py-2 px-4 border-b bg-gray-200">Image</th>
            <th class="py-2 px-4 border-b bg-gray-200">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($con, "SELECT * FROM products");
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                      <td class='py-2 px-4 border-b'>{$row['product_name']}</td>
                      <td class='py-2 px-4 border-b'>{$row['price']}</td>
                      <td class='py-2 px-4 border-b'>{$row['category_ID']}</td>
                      <td class='py-2 px-4 border-b'>
                          <img src='{$row['image']}' alt='{$row['product_name']}' class='w-16 h-16 object-cover'>
                      </td>
                      <td class='py-2 px-4 border-b'>
                          <a href='index.php?id={$row['productID']}' class='text-blue-500 hover:text-blue-700'>Edit</a>
                          |
                          <a href='delete_product.php?id={$row['productID']}' class='text-red-500 hover:text-red-700'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <?php
}
?>


  </body>

  </html>



<?php 
if (isset($_POST["submit"])) {
  $name = $_POST["product_name"];
  $price = $_POST["price"];
  $category_ID = intval($_POST['category_id']);
  $image_location = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];
  $image_up = "../client/image" . $image_name;

  if (move_uploaded_file($image_location, $image_up)) {
      try {
          $update = $con->prepare("UPDATE products SET product_name=?, price=?, image=?, category_ID=? WHERE productID=?");
          $update->bind_param("sisii", $name, $price, $image_up, $category_ID, $edit_id);

          // Debugging: Output the values for debugging
          echo "name: $name, price: $price, image: $image_up, category_ID: $category_ID, edit_id: $edit_id<br>";

          if ($update->execute()) {
              echo "Product updated successfully!";
          } else {
              echo "Error updating product: " . $con->error;
          }
      } catch (mysqli_sql_exception $e) {
          echo "Error: " . $e->getMessage();
      }
  } else {
      echo "Error uploading image.";
  }
}
?>
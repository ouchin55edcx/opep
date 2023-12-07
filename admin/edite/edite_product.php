<?php
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
           <input value="<?= $products["product_name"] ?>" name="product_name" type="text" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
           <input value="<?= $products["productID"] ?>" name="productId" type="hidden">
         </div>
         <div>
           <label class="text-white dark:text-gray-200">Product Price</label>
           <input value="<?= $products["price"] ?>" name="price" type="number" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
         </div>
         <div>
           <label class="text-white dark:text-gray-200" for="passwordConfirmation">Category</label>
           <select name="category_id" class=" w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
             <?php

             foreach ($categories as $category) { ?>

               <option <?php if ($products["category_ID"] == $category["category_ID"]) {
                         echo 'selected';
                       } ?> value='<?= $category["category_ID"]  ?>'><?= $category["category_name"] ?></option>
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
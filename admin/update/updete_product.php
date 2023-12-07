<?php
if (isset($_POST['edit'])) {
  $id_product = $_POST['productId'];
  $name = $_POST["product_name"];
  $price = $_POST["price"];
  $category_ID = intval($_POST['category_id']);
  $image = $_FILES['image'];
  $image_location = $image['tmp_name'];
  $image_name = $image['name'];


  //  condition check image 


  if ($image_name = '') {
    $sql = $con->prepare("UPDATE `products` SET `product_name`=?,`price`=?,`category_ID`=? WHERE `productID`=?");
    $sql->bind_param("siii", $name, $price, $category_ID, $id_product);
  } else {
    $image_up = "../client/image" . $image_name;
    move_uploaded_file($image_location, $image_up);
    $sql = $con->prepare("UPDATE `products` SET `product_name`=?,`price`=?,`image`=?,`category_ID`=? WHERE `productID`=?");
    $sql->bind_param("sisii", $name, $price, $image_up, $category_ID, $id_product);
  }
  $sql->execute();
}
?>
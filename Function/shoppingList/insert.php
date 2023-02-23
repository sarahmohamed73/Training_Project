<?php
  $id = $_GET['id'];
  include "../../admin/Function/connection.php";
  $insert = "INSERT INTO carts (id, name, image, price, quantity) SELECT id, name, image, price,1 FROM products WHERE id = $id ON DUPLICATE KEY UPDATE quantity=quantity+1";
  $query = $conn -> query($insert);
  if($query) {
    header("location: ../../cart.php");
  } else {
    echo $conn -> error;
  }
?>
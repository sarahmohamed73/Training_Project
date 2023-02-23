<?php
  $action = $_GET['action'];
  $id = $_GET['id'];
  include "../../admin/Function/connection.php";
  if($action == "decrease") {
    $update = "UPDATE carts SET quantity = quantity - 1 WHERE quantity > 0 AND id = $id";
    $query = $conn -> query($update);
  } else if($action == "increase") {
    $update = "UPDATE carts SET quantity = quantity + 1 WHERE id = $id";
    $query = $conn -> query($update);
  }
  if($query) {
    header("location: ../../cart.php");
  } else {
    echo $conn -> error;
  }
?>
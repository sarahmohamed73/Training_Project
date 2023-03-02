<?php
  $action = $_GET['action'];
  $id = $_GET['id'];
  include "../../admin/Function/connection.php";
  if($action == "decrease") {
    $update = "UPDATE carts SET quantity = quantity - 1 WHERE quantity > 0 AND id = $id";
    $query = $conn -> query($update);
    $delete = "DELETE FROM carts WHERE quantity = 0";
    $queryDelete = $conn -> query($delete);
  } else if($action == "increase") {
    $update = "UPDATE carts SET quantity = quantity + 1 WHERE id = $id";
    $query = $conn -> query($update);
  }
  if($query) {
    $selectquantity = $conn -> query("SELECT quantity FROM carts WHERE id = $id") -> fetch_assoc();
    echo $selectquantity['quantity'];
  } else {
    echo $conn -> error;
  }
?>
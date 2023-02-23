<?php
  $id = $_GET['id'];
  include "../../admin/Function/connection.php";
  $delete = "DELETE FROM carts WHERE id = $id";
  $query = $conn -> query($delete);
  if($query) {
    header("location: ../../cart.php");
  } else {
    echo $conn -> error;
  }
?>
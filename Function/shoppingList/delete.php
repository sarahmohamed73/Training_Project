<?php
  $id = $_GET['id'];
  include "../../admin/Function/connection.php";
  $delete = "DELETE FROM carts WHERE id = $id";
  $query = $conn -> query($delete);
  if(!$query) {
    echo $conn -> error;
  }
?>
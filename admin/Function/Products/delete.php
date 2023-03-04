<?php 
  if(!isset($_POST['id'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  include "../connection.php";
  $id = $_POST['id'];
  $delete = "DELETE FROM products WHERE id = $id";
  $query = $conn -> query($delete);
  if($query) {
    header("location: ../../products.php");
  } else {
    echo $conn -> error;
  }
?>
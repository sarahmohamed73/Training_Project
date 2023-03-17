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
    echo "Delete Successfully";
  } else {
    echo $conn -> error;
  }
?>
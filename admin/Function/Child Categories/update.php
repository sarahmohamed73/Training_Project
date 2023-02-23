<?php 
  if(!isset($_POST['id'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }

  include_once "../connection.php";
  extract($_POST);

  $update = "UPDATE categories_from_category SET
            name = '$name',
            cat_id = '$category'
            WHERE id = $id";
  $query = $conn -> query($update);
  if($query) {
    header("location: ../../categories.php");
  } else {
    echo $conn -> error;
  }
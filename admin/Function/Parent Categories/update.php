<?php 
  if(!isset($_POST['id'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }

  include_once "../connection.php";
  extract($_POST);

  $update = "UPDATE categories SET
            name = '$name'
            WHERE id = $id";
  $query = $conn -> query($update);
  if($query) {
    header("location: ../../categories.php");
  } else {
    echo $conn -> error;
  }
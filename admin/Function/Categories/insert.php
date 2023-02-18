<?php
  if(!isset($_POST["name"])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  if (empty($_POST["name"])) {
    header("location: ../../products.php");
    exit();
  }

  extract($_POST);

  include "../connection.php";
  $insert = "INSERT INTO categories 
  (name) 
  VALUES 
  ('$name')";

  $query = $conn -> query($insert);
  if($query) {
    header('location: ../../products.php');
  } else {
    echo $conn -> error;
  }
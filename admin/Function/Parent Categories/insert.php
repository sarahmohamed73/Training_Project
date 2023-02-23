<?php
  if(!isset($_POST["name"])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  if (empty($_POST["name"])) {
    header("location: ../../categories.php");
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
    header('location: ../../categories.php');
  } else {
    echo $conn -> error;
  }
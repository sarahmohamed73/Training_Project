<?php
  if(!isset($_POST['name'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }

  extract($_POST);
  include "../../admin/Function/connection.php";
  $insert = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  $query = $conn -> query($insert); 
  if($query) {
    echo "<div class='alert alert-success'> message sent successfully</div>";
  } else {
    echo $conn -> error;
  }
?>
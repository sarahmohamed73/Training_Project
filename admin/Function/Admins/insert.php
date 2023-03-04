<?php 
  if(!isset($_POST['username'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  

  if(empty($_POST['username']) && empty($_POST['password'])) {
    header('location: ../../admins.php');
    exit();
  }
  
  include_once "../connection.php";
  extract($_POST);
  $encryptionPass = md5($password);
  $insert = "INSERT INTO admins 
  (username , password, email, phone, gender, address, privliges)
  VALUES
  ('$username','$encryptionPass','$email','$phone','$gender','$address','$privliges')";
  $query = $conn -> query($insert);
  if($query) {
    $id = $conn -> insert_id;
    echo $id;
  } else {
    echo $conn -> error;
  }
?>
<?php 
  if(!isset($_POST['id'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }

  include_once "../connection.php";
  extract($_POST);


  if($password != "") {
    $encryptionPass = md5($password);
    $updataPass = "UPDATE admins SET password = '$encryptionPass' WHERE id = '$id'";
    $queryPass = $conn -> query($updataPass);
    
  }

  $update = "UPDATE admins SET 
            username = '$username',
            email = '$email',
            phone = '$phone',
            address = '$address',
            gender = '$gender',
            privliges = '$privliges' 
            WHERE id = $id" ;
  $query = $conn -> query($update);
  if($query) {
    echo "Update Sucessfully";
  } else {
    echo $conn -> error;
  }
?>
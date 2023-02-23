<?php 
  session_start();
  include "Connection.php";
  if(empty($_POST['email']) && empty($_POST['password'])) {
    $_SESSION["noInfo"] = "<div class='alert alert-danger rounded-pill'>Please Enter Your Credentials</div>";
    header("location: ../login.php");
    exit();
  }

  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $select = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
  $query = $conn -> query($select);
  if($query -> num_rows > 0) {
    $user = $query -> fetch_assoc();
    $_SESSION["log_name"] = $user["username"];
    $_SESSION["log_id"] = $user["id"];
    if(isset($_GET['pageName'])) {
      header("location: ../$_GET[pageName]");
    } else {
      header("location: ../index.php");
    }
  } else {
    $_SESSION["wrongInfo"] = "<div class='alert alert-danger rounded-pill'>Wrong Credentials</div>";
    header("location: ../login.php");
  }
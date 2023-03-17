<?php
  session_start();
  $coupon = $_POST['coupon'];
  include "../../admin/Function/connection.php";
  $select = "SELECT * FROM coupon WHERE name = '$coupon'";
  $query = $conn -> query($select);
  if($query -> num_rows > 0) {
    $coupon = $query -> fetch_assoc();
    $_SESSION['coupon'] = $coupon['name'];
    $_SESSION['discount'] = $coupon['discount'];
    $couponName = $coupon['name'];
    $couponDiscount = $coupon['discount'];
    echo "$couponName+$couponDiscount";
  } else {
    echo $conn -> error;
  }
?>
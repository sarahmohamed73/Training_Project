<?php
  session_start();
  extract($_POST);
  $first_name = implode(",",$first_name);
  $last_name = implode(",",$last_name);
  $email = implode(",",$email);
  $phone = implode(",",$phone);
  $company_name = implode(",",$company_name);
  $country = implode(",",$country);
  $address_line1 = implode(",",$address_line1);
  $address_line2 = implode(",",$address_line2);
  $city = implode(",",$city);
  $state = implode(",",$state);
  $total = $_SESSION['totalPrice'];
  $coupon = $_SESSION['coupon'];
  include "../../admin/Function/connection.php";

  $insertBuyer = "INSERT INTO buyers
  (first_name, last_name, email, phone, company_name, country, address_line1, address_line2, city, state, total, coupon)
  VALUES
  ('$first_name', '$last_name', '$email', '$phone', '$company_name', '$country', '$address_line1', '$address_line2', '$city', '$state', '$total', '$coupon')";
  $query1 = $conn -> query($insertBuyer);
  
  $insertOrder = "INSERT INTO orders_items (name, price, quantity) SELECT name, price, quantity SELECT id FROM buyers FROM carts";
  $query2 = $conn -> query($insertOrder);

  if($query1 && $query2) {
    // unset($_SESSION['coupon']);
    // $delete = "DELETE FROM carts";
    // $query = $conn -> query($delete);
    header("location: ../../cart.php");
  } else {
    echo $conn -> error;
  }
?>
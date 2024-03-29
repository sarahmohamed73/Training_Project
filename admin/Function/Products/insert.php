<?php
  if(!isset($_POST['name'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  if (empty($_POST["name"]) && empty($_POST["category"])) {
    header("location: ../../products.php");
    exit();
  }

  extract($_POST);
  
  $imgName = $_FILES['image']['name'];
  $temp = $_FILES['image']['tmp_name'];
  $imgNumber = count($imgName);
  /**
   * 1 - If there is an image upload
   * 2 - Specify extension -- images 
   * 3 - Check file size < 2mb
   * 4 - Rename the image with unique random name
   * 5 - Move uploaded image to the server -- with new name
   * 6 - Insert image name into the datase  -- new name
  */

  // If there is an image upload
  for($i = 0 ; $i < $imgNumber ; $i++) {
    if($_FILES['image']['error'][$i] == 0) {
      // Specify extension -- images 
      $extensions = ['jpg','png','jpeg','gif','webp'];
      $extension = pathinfo($imgName[$i], PATHINFO_EXTENSION);
      if(in_array($extension, $extensions)) {
        // Check file size < 2mb 
        if($_FILES['image']['size'][$i] < 2000000) {
          // Rename the image with unique random name
          $imgName[$i] = md5(uniqid()).".$extension";
          // Move uploaded image to the server -- with new name
          move_uploaded_file($temp[$i], "../../Images/$imgName[$i]");
        } else {
          echo "The File Too Big";
          exit();
        }
      } else {
        echo "Wrong Extension";
        exit();
      }
    } else {
      echo "You Must Upload An Image";
      exit();
    }
  }

  $images = implode("," , $imgName);
  include "../connection.php";
  $insert = "INSERT INTO products 
  -- Insert image name into the database  -- new name
  (name, price, sale, image, cat_id, trending, description) 
  VALUES 
  ('$name', '$price', '$sale', '$images', '$category', '$trending', '$description')";

  $query = $conn -> query($insert);
  if($query) {
    $id = $conn -> insert_id;
    $data = [$id, $images];
    echo "$id+$images";
  } else {
    echo $conn -> error;
  }
?>
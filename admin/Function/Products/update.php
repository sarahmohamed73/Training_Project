<?php 
  if(!isset($_POST['id'])) {
    header("location: ../../ErrorPage.php");
    exit();
  }
  
  include "../connection.php";
  extract($_POST);
  $imgName = $_FILES['image']['name'];
  $temp = $_FILES['image']['tmp_name'];
  $imgNumber = count($imgName);
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
          // Update image name into the database  -- new name
          $images = implode("," , $imgName);
          $updateImg = "UPDATE products SET image = '$images' WHERE id = '$id'";
          $queryImg = $conn -> query($updateImg);
        } else {
          echo "The File Too Big";
          exit();
        }
      } else {
        echo "Wrong Extension";
        exit();
      }
    }
  }

  $update = "UPDATE products SET 
            name = '$name',
            price = '$price',
            sale = '$sale',
            cat_id = '$category',
            description = '$description'
            WHERE id = '$id'";
  $query = $conn -> query($update);
  if ($query) {
    header("location: ../../products.php");
  } else {
    echo $conn -> error;
  }